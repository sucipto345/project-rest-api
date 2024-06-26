<?php

namespace App\Http\Controllers\api;


use App\Enums\Status;
use App\Models\Validations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'validations' => Validations::latest('id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'job_category_id' => 'required|exists:job_categories,id',
            'work_experience' => 'required|string',
            'job_position' => 'required|string',
            'reason_accepted' => 'required|string'
        ]);


        $validatedData['society_id'] = Auth::id();
        $validatedData['status'] = Status::PENDING;

        if (session('restricted_validation_access')) {
            return response()->json(['error' => 'You are not authorized to add validation data']);
        }

        $validations = Validations::create($validatedData);

        return response()->json([
            'message' => 'Validation request sent successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
