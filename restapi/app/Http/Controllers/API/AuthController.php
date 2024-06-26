<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'id_card_number' => 'required',
            'password' => 'required',
        ]);

        $society = Society::with('regional')->where('id_card_number', $request->id_card_number)->first();

        if (!$society || $request->password !== $society->password) {
            throw ValidationException::withMessages([
                'id_card_number' => ['ID Card Number or Password incorrect'],
            ]);
        }

        $token = $society->createToken('auth_token')->plainTextToken;

        return response()->json([
            'name' => $society->name,
            'born_date' => $society->born_date,
            'gender' => $society->gender,
            'address' => $society->address,
            'token' => $token,
            'regional' => [
                'id' => $society->regional->id,
                'province' => $society->regional->province,
                'district' => $society->regional->district,
            ],
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout success'], 200);
    }
}
