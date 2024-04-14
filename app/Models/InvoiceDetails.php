<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = 'fms_g7ar_invoice_details';
       // protected $table = 'ar_invoice_details';

    protected $fillable = [
        'items',
        'category',
        'quantity',
        'price',
        'amount',
        'amount_discount',
    ];

    public function invoiceCustomerNames(){
        return $this->hasMany(InvoiceCustomerName::class, 'id', 'po_number');
    }


}
