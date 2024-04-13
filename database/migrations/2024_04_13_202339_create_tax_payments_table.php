<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTaxPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5tax_payments', function (Blueprint $table) {
            $table->id();
            $table->string('taxpayer_name');
            $table->string('tax_type');
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_date')->useCurrent();
            $table->string('payment_method');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        // Adding more sample data
        DB::table('fms_g5tax_payments')->insert([
            [
                'taxpayer_name' => 'Michael Davis',
                'tax_type' => 'Corporate Income Tax',
                'amount' => 5000.00,
                'payment_date' => now(),
                'payment_method' => 'Credit Card',
                'status' => 'Paid'
            ],
            [
                'taxpayer_name' => 'Sophia Rodriguez',
                'tax_type' => 'Value Added Tax (VAT)',
                'amount' => 1500.25,
                'payment_date' => now(),
                'payment_method' => 'Bank Transfer',
                'status' => 'Pending'
            ],
            [
                'taxpayer_name' => 'William Taylor',
                'tax_type' => 'Excise Tax',
                'amount' => 750.80,
                'payment_date' => now(),
                'payment_method' => 'PayPal',
                'status' => 'Paid'
            ],
            [
                'taxpayer_name' => 'Olivia Martinez',
                'tax_type' => 'Local Property Tax',
                'amount' => 1200.00,
                'payment_date' => now(),
                'payment_method' => 'Debit Card',
                'status' => 'Pending'
            ],
            // Add more sample data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g5tax_payments');
    }
}
