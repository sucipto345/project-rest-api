<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Society extends Model implements AuthenticatableContract
{
    use Authenticatable, HasApiTokens, Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'societies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_card_number',
        'password',
        'name',
        'born_date',
        'gender',
        'address',
        'regional_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'login_tokens',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'born_date' => 'date',
        'gender' => 'string',
    ];
    /**
     * Get the regional that owns the society.
     */
    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }
    /**
     * Set the password attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = ($value);
    }
}
