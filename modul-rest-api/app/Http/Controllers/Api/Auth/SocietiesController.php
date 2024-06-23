<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Society;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocietiesController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $idCardNumber = $request->input('id_card_number');
        $password = $request->input('password');

        // Validate ID card number
        if (!$idCardNumber || !is_numeric($idCardNumber)) {
            return response()->json(['message' => 'Invalid ID Card Number'], 400);
        }

        // Check if society exists with the provided ID card number
        $society = Society::where('id_card_number', $idCardNumber)->first();

        if (!$society) {
            return response()->json(['message' => 'ID Card Number not found'], 404);
        }

        // Hash the input password
        $hashedPassword = Hash::make($password);

        // Validate password
        if (!Hash::check($hashedPassword, $society->password)) {
            return response()->json(['message' => 'Password incorrect'], 401);
        }

        // Login the user
        Auth::login($society);

        return response()->json(['message' => 'Logged in successfully'], 200);
    }

    /**
     * Handle a logout request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        try {
            Sanctum::revokeToken($token);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unable to revoke token'], 500);
        }

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
