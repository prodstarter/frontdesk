<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'department_id',
        'designation_id', 
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute () 
    {
        return $this->first_name.' '.$this->last_name;  
    }
    /**
     * > This function returns the designation of the user
     *
     * @return The designation for the employee.
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    /**
     * > This function returns the department that owns the post
     *
     * @return The department that created the question.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}