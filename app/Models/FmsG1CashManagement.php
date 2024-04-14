<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FmsG1CashManagement extends Model
{
    use HasFactory;

    protected $table = 'fms_g1cash_management';

    protected $fillable = [
        'description',
        'revenue',
        'income',
        'outflow',
        'net_income',
    ];
     /**
     * Update revenue based on the provided amount.
     *
     * @param  float  $amount
     * @return void
     */
    public function updateRevenue($amount)
    {
        $this->revenue += $amount;
        $this->save();
    }
}
