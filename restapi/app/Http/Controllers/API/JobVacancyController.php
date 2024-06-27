<?php

namespace App\Http\Controllers\API;

use App\Models\JobVacancy;
use Illuminate\Routing\Controller;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::all(); // Fetch all job vacancies
        return response()->json($jobVacancies);
    }

    public function getByCategory($job_category_id)
    {
        $jobVacancies = JobVacancy::where('job_category_id', $job_category_id)->get();

        if ($jobVacancies->isEmpty()) {
            return response()->json([
                'message' => 'No job vacancies found for this category'
            ], 404);
        }

        return response()->json([
            'job_vacancies' => $jobVacancies
        ]);
    }
}
