<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxPayment extends Model
{
    use HasFactory; // Ensure this line is present

    protected $table = 'fms_g5tax_payments';


    protected $fillable = [
        'taxpayer_name', 'tax_type', 'amount', 'payment_date', 'payment_method', 'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'created' event, which occurs after a new record is created
        static::created(function ($taxPayment) {
            // Update revenue in FmsG1CashManagement
            $fmsG1CashManagement = FmsG1CashManagement::first();
            if ($fmsG1CashManagement) {
                $fmsG1CashManagement->updateRevenue($taxPayment->amount);
            }
        });
    }
}
