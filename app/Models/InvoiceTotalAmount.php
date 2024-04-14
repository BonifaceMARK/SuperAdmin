<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTotalAmount extends Model
{
    use HasFactory;

    //protected $table = 'fgms_g7_invoice_total_amounts';

    protected $table = 'fms_g7ar_invoice_total_amounts';
    protected $fillable = [
        'invoice_id',
        'taxable_amount',
        'round_off',
        'total_amount',
        'upload_sign',
        'name_of_the_signatuaory',
    ];
}