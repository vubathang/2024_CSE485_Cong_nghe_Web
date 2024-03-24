<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'departmentId';
    protected $fillable = ['departmentName', 'address', 'email', 'phone', 'parentDepartmentId'];

    public function children()
    {
        return $this->hasMany(Department::class, 'parentDepartmentId');
    }

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parentDepartmentId');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'departmentId');
    }
}
