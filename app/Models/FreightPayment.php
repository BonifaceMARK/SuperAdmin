<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreightPayment extends Model
{

    protected $table = 'fms_g5freight_payments';
    protected $fillable = [
        'freightService', 'freightAmount', 'freightDate', 'freightDescription', 'freightStatus'
    ];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($FreightPayment) {
            $fmsG1CashManagement = FmsG1CashManagement::first();
            if ($fmsG1CashManagement) {
                $fmsG1CashManagement->updateRevenue($FreightPayment->freightAmount);
            }
        });
    }
}
