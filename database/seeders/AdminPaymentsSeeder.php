<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\AdminPayment;

class AdminPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $adminPayments = [
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 500.00,
                'paymentDate' => now(),
                'description' => 'Office supplies purchase',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 750.00,
                'paymentDate' => now(),
                'description' => 'Software license renewal',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Salary',
                'amount' => 2000.00,
                'paymentDate' => now(),
                'description' => 'Monthly salary payment',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 1200.00,
                'paymentDate' => now(),
                'description' => 'Office equipment maintenance',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 800.00,
                'paymentDate' => now(),
                'description' => 'Marketing campaign expenses',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Salary',
                'amount' => 1500.00,
                'paymentDate' => now(),
                'description' => 'Bonus payment',
                'status' => 'Pending'
            ],
        ];

        // Insert data into the database
        foreach ($adminPayments as $payment) {
            AdminPayment::create($payment);
        }
    }
}
