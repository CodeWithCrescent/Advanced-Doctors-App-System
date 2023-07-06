<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Get the Session that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * Get the Patient that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
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
    protected $table = 'appointments';

    protected $primaryKey = 'appointment_id';
        
    protected $fillable = [
        'appointment_num',
        'reference_num',
        'client_id',
        'session_id',
        'status',
    ];
    
    protected $attributes = [
        'status' => 0,
    ];
}
