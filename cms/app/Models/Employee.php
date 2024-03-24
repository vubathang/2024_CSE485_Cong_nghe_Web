<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentId', 'departmentId');
    }

    public function user() {
        return $this->hasOne(User::class, 'employeeId', 'employeeId');
    }
    protected $primaryKey = 'employeeId';
    protected $fillable = ['fullName', 'address', 'phone', 'position', 'avatar', 'departmentId'];
}