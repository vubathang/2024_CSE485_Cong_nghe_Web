<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'employeeId';
    protected $fillable = [
        'fullName',
        'address',
        'email',
        'phone',
        'position',
        'avatar',
        'departmentId'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentId', 'departmentId');
    }

}
