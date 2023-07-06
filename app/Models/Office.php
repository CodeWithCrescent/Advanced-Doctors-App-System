<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
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
    /**
     * Get the Department that owns the Office
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
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
    protected $table = 'offices';
        
    protected $fillable = [
        'office_name',
        'department_id',
        'added_by',
    ];
    
    protected $attributes = [
        'added_by' => 'Super Admin',
    ];
}
