<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * Get all of the DoctorInformations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    // Btn get and Attribute is variable name Body
    public function getFirstnameAttribute($value)
    {
        return ucfirst($value); //Accessor ** Set first letter to capital from databade
    }
    public function getLastnameAttribute($value)
    {
        return ucfirst($value); //Accessor ** Set first letter to capital from databade
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'initial',
        'firstname',
        'lastname',
        'phone',
        'email',
        'gender',
        'password',
    ];
    
    protected $attributes = [
        'role' => '0',
        'password' => '123456',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
