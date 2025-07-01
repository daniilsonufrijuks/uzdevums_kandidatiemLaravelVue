<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $table = 'Employees';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
