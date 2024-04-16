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
    /**
 * Add revenue to cash management.
 *
 * @param  float  $amount
 * @return void
 */
public static function addRevenue($amount)
{
    $cashManagement = self::firstOrNew([]);
    $cashManagement->revenue += $amount;
    $cashManagement->save();
}
 /**
     * Get the financial health status based on net income.
     *
     * @return string
     */
    public function financialHealthStatus()
    {
        return $this->net_income >= 0 ? 'Healthy' : 'Poor';
    }

}
