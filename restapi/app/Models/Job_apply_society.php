<?php

// app/Models/JobApplySociety.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_apply_society extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_apply_societies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notes',
        'date',
        'society_id',
        'job_vacancy_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the society that owns the job apply.
     */
    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    /**
     * Get the job vacancy that owns the job apply.
     */
    public function jobVacancy()
    {
        return $this->belongsTo(Job_vacancy::class);
    }
}
