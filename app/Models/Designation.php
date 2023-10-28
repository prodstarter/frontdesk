<?php

namespace App\Models;

use App\Traits\UuidScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UuidScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'department_id'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * > This function returns the employees of the user
     *
     * @return The employees for the designation.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * The department() function returns the department that the employee belongs to
     *
     * @return The department that the employee belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}