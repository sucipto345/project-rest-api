<?php


namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Validations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'validations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_category_id',
        'society_id',
        'validator_id',
        'status',
        'work_experience',
        'job_position',
        'reason_accepted',
        'validator_notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => Status::class,
    ];

    /**
     * Get the job category that owns the validation.
     */
    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    /**
     * Get the society that owns the validation.
     */
    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    /**
     * Get the validator that owns the validation.
     */
    public function validator()
    {
        return $this->belongsTo(Validator::class);
    }
}
