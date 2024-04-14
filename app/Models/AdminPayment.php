<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPayment extends Model
{

    protected $table = 'fms_g5admin_payments';
    protected $fillable = [
        'paymentType', 'amount', 'paymentDate', 'description', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($AdminPayment) {
            $fmsG1CashManagement = FmsG1CashManagement::first();
            if ($fmsG1CashManagement) {
                $fmsG1CashManagement->updateRevenue($AdminPayment->amount);
            }
        });
    }
}

