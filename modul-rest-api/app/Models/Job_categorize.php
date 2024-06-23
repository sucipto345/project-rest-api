<?php

// app/Models/JobCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_category',
    ];

    /**
     * Get the job vacancies that belong to the job category.
     */
    public function jobVacancies()
    {
        return $this->hasMany(Job_vacancy::class);
    }
}
