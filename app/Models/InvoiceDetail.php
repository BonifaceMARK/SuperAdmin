<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'fms_g7ar_invoice_details';

    protected $fillable = [
        'items',
        'category',
        'quantity',
        'price',
        'amount',
        'discount',
    ];
}
