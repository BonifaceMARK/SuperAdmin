<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaxPayment;
use App\Models\FmsG1CashManagement;
use Carbon\Carbon;

class TaxPaymentSeeder extends Seeder
{
    public function run()
    {
        // Generate fake tax payment data
        TaxPayment::factory(100)->create();

        // Update revenue in FmsG1CashManagement for each created tax payment
        TaxPayment::created(function ($taxPayment) {
            $fmsG1CashManagement = FmsG1CashManagement::first();
            if ($fmsG1CashManagement) {
                $fmsG1CashManagement->updateRevenue($taxPayment->amount);
            }
        });
    }
}
