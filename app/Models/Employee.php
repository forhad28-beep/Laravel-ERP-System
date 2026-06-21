<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'email',
        'phone',
        'designation',
        'salary',
        'status'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
