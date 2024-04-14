<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PayableInvoice extends Model
{
    use HasFactory;
       protected $table = 'fms_g7ar_invoice_details';

    protected $fillable = [
        'vendor_id',
        'purchase_order_id',
        'amount',
        'date_created',
        'date_due',
    ];
    public function setDateCreatedAttribute($value)
    {
        $this->attributes['date_created'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setDueDateAttribute($value)
    {
        $this->attributes['date_due'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
}
