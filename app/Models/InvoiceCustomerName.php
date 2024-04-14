<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCustomerName extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fms_g7ar_invoice_customer_names';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'reference',
        'customer_name',
        'po_number',
        'date',
        'due_date',
        'enable_tax',
        'recurring_invoice',
        'by_month',
        'month',
        'amount',
        'invoice_from',
        'invoice_to',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'invoice_from' => 'array',
        'invoice_to' => 'array',
        'status' => 'array',
    ];
}
