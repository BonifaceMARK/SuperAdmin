<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5freight_payments', function (Blueprint $table) {
            $table->id();
            $table->string('freightService');
            $table->decimal('freightAmount', 10, 2);
            $table->dateTime('freightDate');
            $table->text('freightDescription')->nullable();
            $table->string('freightStatus');
            $table->timestamps();
        });

        // Add 14 sample data entries
        DB::table('fms_g5freight_payments')->insert([
            [
                'freightService' => 'Shipping',
                'freightAmount' => 500.00,
                'freightDate' => now(),
                'freightDescription' => 'Goods shipment to New York',
                'freightStatus' => 'Pending'
            ],
            [
                'freightService' => 'Logistics',
                'freightAmount' => 700.00,
                'freightDate' => now(),
                'freightDescription' => 'Freight services for manufacturing units',
                'freightStatus' => 'Approved'
            ],
            [
                'freightService' => 'Courier',
                'freightAmount' => 300.00,
                'freightDate' => now(),
                'freightDescription' => 'Express delivery of documents',
                'freightStatus' => 'Pending'
            ],
            [
                'freightService' => 'Air Cargo',
                'freightAmount' => 1200.00,
                'freightDate' => now(),
                'freightDescription' => 'Airfreight services for international trade',
                'freightStatus' => 'Approved'
            ],
            [
                'freightService' => 'Parcel Delivery',
                'freightAmount' => 250.00,
                'freightDate' => now(),
                'freightDescription' => 'Door-to-door delivery service',
                'freightStatus' => 'Pending'
            ],
            [
                'freightService' => 'Trucking',
                'freightAmount' => 800.00,
                'freightDate' => now(),
                'freightDescription' => 'Goods transportation by trucks',
                'freightStatus' => 'Approved'
            ],
            [
                'freightService' => 'Railway Cargo',
                'freightAmount' => 950.00,
                'freightDate' => now(),
                'freightDescription' => 'Transportation of bulk goods by train',
                'freightStatus' => 'Pending'
            ],
            [
                'freightService' => 'Sea Freight',
                'freightAmount' => 1800.00,
                'freightDate' => now(),
                'freightDescription' => 'Ocean shipping for international trade',
                'freightStatus' => 'Approved'
            ],
            // Add more sample data entries similarly
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g5freight_payments');
    }
};
