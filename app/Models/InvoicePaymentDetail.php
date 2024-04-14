<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePaymentDetail extends Model
{
    protected $table = 'fms_g7ar_invoice_payment_details';

    protected $fillable = [
        'reference_no',
        'invoice_id',
        'account_holder_name',
        'bank_name',
        'ppts_code',
        'account_number',
        'add_terms_and_conditions',
        'add_notes',
    ];
}

