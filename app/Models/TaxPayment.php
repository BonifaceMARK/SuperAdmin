<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxPayment extends Model
{
    protected $table = 'fms_g5tax_payments';

    protected $fillable = [
        'taxpayer_name', 'tax_type', 'amount', 'payment_date', 'payment_method', 'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];
}
