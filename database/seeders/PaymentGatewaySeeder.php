<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentGateway;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $paymentData = [
            [
                'reference' => 'REF12345',
                'productName' => 'Product A',
                'transactionName' => 'Transaction A',
                'paymentMethod' => 'Credit Card',
                'cardType' => 'Visa',
                'transactionType' => 'Purchase',
                'transactionAmount' => 100.00,
                'transactionDate' => now(),
                'description' => 'Payment for Product A',
                'transactionStatus' => 'Success',
                'comment' => 'Transaction completed successfully.',
            ],
            [
                'reference' => 'REF67890',
                'productName' => 'Product B',
                'transactionName' => 'Transaction B',
                'paymentMethod' => 'Debit Card',
                'cardType' => 'MasterCard',
                'transactionType' => 'Refund',
                'transactionAmount' => 50.00,
                'transactionDate' => now(),
                'description' => 'Refund for Product B',
                'transactionStatus' => 'Success',
                'comment' => 'Refund processed successfully.',
            ],
            // Add more payment data as needed
        ];

        // Insert data into the database
        foreach ($paymentData as $payment) {
            PaymentGateway::create($payment);
        }
    }
}
