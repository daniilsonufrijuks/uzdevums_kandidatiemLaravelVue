<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;
    protected $table = 'Attendance';

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }
}
