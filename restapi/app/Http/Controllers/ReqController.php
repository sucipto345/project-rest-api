<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReqController extends Controller
{
    public function request(Request $request)
    {
        $user = auth()->user(); // Get the logged-in user
        $data = $user->toArray(); // Convert user to associative array

        $rules = [
            'work_experience' => 'required',
            'job_category_id' => ['required', 'integer', 'exists:job_categories,id'],
            'job_position' => 'required',
            'reason_accepted' => 'required',
        ];

        $validator = Validator::make($data, $rules); // Validate user's data

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid request'], 400);
        }

        // Process valid request data here
        // ... (your logic using $request->input('work_experience'), etc.)

        return response()->json(['message' => 'Request received successfully']);
    }
}
