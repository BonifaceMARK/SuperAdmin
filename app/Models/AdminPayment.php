<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPayment extends Model
{
    protected $fillable = [
        'paymentType', 'amount', 'paymentDate', 'description', 'status'
    ];
}

