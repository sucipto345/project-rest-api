<?php

namespace App\Http\Controllers\API;

use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::all(); // Fetch all job vacancies
        return response()->json($jobVacancies);
    }

    public function show($job_vacancy_id)
    {
        $jobVacancy = JobVacancy::find($job_vacancy_id);
        if (!$jobVacancy) {
            return abort(404); // Handle invalid ID
        }
        return response()->json($jobVacancy); // Return job vacancy details as JSON
    }
}
