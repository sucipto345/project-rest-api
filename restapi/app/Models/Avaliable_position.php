<?php

// app/Models/AvailablePosition.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Available_position extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'available_positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_vacancy_id',
        'position',
        'capacity',
        'apply_capacity',
    ];

    /**
     * Get the job vacancy that the available position belongs to.
     */
    public function jobVacancy()
    {
        return $this->belongsTo(Job_vacancy::class);
    }
}
