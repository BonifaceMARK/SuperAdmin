<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $table = '_personaldata';

    protected $fillable = [
        'employeeid',
        'plantillaid',
        'employeecode',
        'lname',
        'fname',
        'mname',
        'nname',
        'rank',
        'datepostion',
        'emp_tin',
        'emp_pagibig',
        'emp_sss',
        'emp_philhealth',
        'emp_hmo',
        'emp_peraa','prc','prc_expiration','emp_bank','teachingtype','positionid','employmentstat','office','deptid','gender','bplace','bdate','resigned_reason','nationalityid','religionid','civil_status','citizenid','personal_email',
        'mobile','landline','email','isactive','teaching','branch','created_at','updated_at','present_address','isEmployee'
        // Add other fields here as needed
    ];
}
