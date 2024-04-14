<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fms_g5hotel_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'productName',
        'transactionName',
        'paymentMethod',
        'cardType',
        'transactionType',
        'transactionAmount',
        'transactionDate',
        'description',
        'transactionStatus',
        'reasonForCancellation',
        'comment',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'transactionDate' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($paymentGateway) {
            $fmsG1CashManagement = FmsG1CashManagement::first();
            if ($fmsG1CashManagement) {
                $fmsG1CashManagement->updateRevenue($paymentGateway->transactionAmount);
            }
        });
    }
}
