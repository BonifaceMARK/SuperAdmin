<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPayment extends Model
{

    protected $table = 'fms_g5admin_payments';
    protected $fillable = [
        'paymentType', 'amount', 'paymentDate', 'description', 'status'
    ];
}

