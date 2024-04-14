<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDescription extends Model
{
    use HasFactory;

    protected $table = 'fms_g9_tbluserdescrip';

    protected $fillable = ['usertype', 'userdesc', 'created_at', 'updated_at'];
}
