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
        Schema::create('fms_g5communicationcollaboration', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference');
            $table->string('productName');
            $table->string('transactionName');
            $table->string('paymentMethod');
            $table->string('cardType');
            $table->string('transactionType');
            $table->decimal('transactionAmount', 10, 2);
            $table->dateTime('transactionDate');
            $table->text('description')->nullable();
            $table->string('transactionStatus');
            $table->string('reasonForCancellation')->nullable();
            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
