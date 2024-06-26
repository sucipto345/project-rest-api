<?php

// app/Models/JobApplyPosition.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_apply_position extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_apply_positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'society_id',
        'job_vacancy_id',
        'position_id',
        'job_apply_societies_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Get the society that owns the job apply position.
     */
    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    /**
     * Get the job vacancy that owns the job apply position.
     */
    public function jobVacancy()
    {
        return $this->belongsTo(Job_vacancy::class);
    }

    /**
     * Get the position that owns the job apply position.
     */
    public function position()
    {
        return $this->belongsTo(Available_position::class);
    }

    /**
     * Get the job apply society that owns the job apply position.
     */
    public function jobApplySociety()
    {
        return $this->belongsTo(Job_apply_society::class);
    }
}
