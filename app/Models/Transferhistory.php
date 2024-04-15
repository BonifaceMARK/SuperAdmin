<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferhistory extends Model
{
    protected $table = 'fms10_transferhistory'; 

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'recipient_id',
        'amount',
        'type',
    ];
}
