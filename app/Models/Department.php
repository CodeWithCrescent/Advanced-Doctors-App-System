<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctor(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
    public function speciality(): HasMany
    {
        return $this->hasMany(Speciality::class);
    }
    public function office(): HasMany
    {
        return $this->hasMany(Office::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($department) {
            $department->speciality()->delete();
            $department->office()->delete();
        });
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
    protected $table = 'departments';
        
    protected $fillable = [
        'department_name',
        'added_by',
    ];
    
    protected $attributes = [
        'added_by' => 'Super Admin',
    ];
}
