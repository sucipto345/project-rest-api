<?php

// app/Models/Validator.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validator extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'validators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role',
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'role' => 'string',
    ];

    /**
     * Get the user that owns the validator.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
