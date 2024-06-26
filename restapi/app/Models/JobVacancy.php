<?php

// app/Models/JobVacancy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_vacancies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_category_id',
        'company',
        'address',
        'description',
    ];

    /**
     * Get the job category that owns the job vacancy.
     */
    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    /**
     * Get the job apply societies for the job vacancy.
     */
    public function jobApplySocieties()
    {
        return $this->hasMany(Job_apply_society::class);
    }
}
