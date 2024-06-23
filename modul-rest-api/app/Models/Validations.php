<?php

// app/Models/Validation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
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
        'ociety_id',
        'validator_id',
        'tatus',
        'work_experience',
        'job_position',
        'eason_accepted',
        'validator_notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tatus' => 'tring',
    ];

    /**
     * Get the job category that owns the validation.
     */
    public function jobCategory()
    {
        return $this->belongsTo(Job_category::class);
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
