<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FixedAssetPayment;

class FixedAssetPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $assetPayments = [
            [
                'asset_name' => 'Laptop',
                'asset_description' => 'New laptop for the office',
                'amount' => 1500.00,
                'payment_date' => now(),
                'payment_method' => 'Credit Card',
                'payment_reference' => 'CC12345',
                'status' => 'Paid'
            ],
            [
                'asset_name' => 'Desk',
                'asset_description' => 'Office desk for employee use',
                'amount' => 750.00,
                'payment_date' => now(),
                'payment_method' => 'Bank Transfer',
                'payment_reference' => 'BT67890',
                'status' => 'Pending'
            ],
            // Add more payment data as needed
        ];

        // Insert data into the database
        foreach ($assetPayments as $payment) {
        FixedAssetPayment::create($payment);
        }
    }
}
