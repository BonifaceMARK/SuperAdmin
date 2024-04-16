<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionHistory;

class TransactionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $transactionHistory = [
            [
                'user_id' => 1,
                'firstname' => 'John',
                'lastname' => 'Doe',
                'amount' => 100.00,
                'description' => 'Payment for services',
                'type' => 'Payment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'amount' => 200.00,
                'description' => 'Purchase of goods',
                'type' => 'Purchase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more transaction history data as needed
        ];

        // Insert data into the database
        foreach ($transactionHistory as $transaction) {
            TransactionHistory::create($transaction);
        }
    }
}
