<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * Get the Department that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->BelongsTo(Department::class);
    }

    /**
     * Get the Speciality that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality(): BelongsTo
    {
        return $this->BelongsTo(Speciality::class);
    }

    /**
     * Get the Office that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function office(): BelongsTo
    {
        return $this->BelongsTo(Office::class);
    }

    /**
     * Get all of the Sessions for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    /**
     * Get all of the Appointments for the Doctor
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
     protected $table = 'doctors';
        
    protected $fillable = [
        'initial',
        'employee_no',
        'speciality_id',
        'department_id',
        'office_id',
        'hospital_id',
        'registered_by',
    ];
    
    protected $attributes = [
        'registered_by' => 'Super Admin',
    ];
}
