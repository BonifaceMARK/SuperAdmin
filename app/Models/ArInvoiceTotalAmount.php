<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArInvoiceTotalAmount extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fms_g7ar_invoice_total_amounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'taxable_amount',
        'round_off',
        'total_amount',
        'upload_sign',
        'name_of_the_signatory',
    ];
}
