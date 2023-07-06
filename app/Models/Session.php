<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    use HasFactory;

    /**
     * Get the Doctor that owns the Session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get all of the Appointments for the Session
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
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
    protected $table = 'sessions';
        
    protected $fillable = [
        'scheduled_date',
        'doctor_id',
        'start_time',
        'end_time',
        'maximum_bookings',
        'description',
        'added_by',
    ];
    
    protected $attributes = [
        'added_by' => 'Super Admin',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'scheduled_date'=>'datetime:Y-m-d',
        'start_time',
        'end_time',
        ];
}
