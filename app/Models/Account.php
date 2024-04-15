<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'fms10_accounts'; 
    
    protected $fillable = [
        'firstname',
        'lastname',
        'user_id',
        'balance',
    ];
}
