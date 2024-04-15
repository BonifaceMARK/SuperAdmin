<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFixedAssetPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5fixed_asset_payments', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->string('asset_description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_date')->useCurrent();
            $table->string('payment_method');
            $table->string('payment_reference')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        // Add six sample data entries
        DB::table('fms_g5fixed_asset_payments')->insert([
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
            [
                'asset_name' => 'Printer',
                'asset_description' => 'Multifunction printer for the office',
                'amount' => 800.00,
                'payment_date' => now(),
                'payment_method' => 'Credit Card',
                'payment_reference' => 'CC54321',
                'status' => 'Pending'
            ],
            [
                'asset_name' => 'Conference Table',
                'asset_description' => 'Large table for conference room meetings',
                'amount' => 2000.00,
                'payment_date' => now(),
                'payment_method' => 'Bank Transfer',
                'payment_reference' => 'BT98765',
                'status' => 'Paid'
            ],
            [
                'asset_name' => 'Office Chairs',
                'asset_description' => 'Ergonomic chairs for the office',
                'amount' => 1200.00,
                'payment_date' => now(),
                'payment_method' => 'Credit Card',
                'payment_reference' => 'CC24680',
                'status' => 'Pending'
            ],
            [
                'asset_name' => 'Projector',
                'asset_description' => 'High-quality projector for presentations',
                'amount' => 1000.00,
                'payment_date' => now(),
                'payment_method' => 'Bank Transfer',
                'payment_reference' => 'BT13579',
                'status' => 'Paid'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g5fixed_asset_payments');
    }
}
