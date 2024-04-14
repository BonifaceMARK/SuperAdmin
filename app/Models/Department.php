<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'fms_g7departments';

    protected $fillable = [
        'department_name',
        'head_of_department',
        'department_start_date',
        'no_of_employee',
    ];
}
