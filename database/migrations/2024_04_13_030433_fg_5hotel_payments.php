<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fg_5hotel_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference');
            $table->string('service'); // Add service column
            $table->string('productName');
            $table->string('transactionName');
            $table->string('paymentMethod'); // Add paymentMethod column
            $table->string('cardType'); // Add cardType column
            $table->string('transactionType');
            $table->decimal('transactionAmount', 10, 2);
            $table->dateTime('transactionDate');
            $table->text('description')->nullable(); // Add description column
            $table->string('transactionStatus');
            $table->string('reasonForCancellation')->nullable();
            $table->text('comment')->nullable();
            // Add more columns if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fg_5paymentgateways');
    }
};
