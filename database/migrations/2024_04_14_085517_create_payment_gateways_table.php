<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5paymentgateways', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->string('productName');
            $table->string('transactionName');
            $table->string('paymentMethod');
            $table->string('cardType');
            $table->string('transactionType');
            $table->decimal('transactionAmount', 10, 2);
            $table->timestamp('transactionDate')->nullable();
            $table->text('description')->nullable();
            $table->string('transactionStatus');
            $table->string('reasonForCancellation')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g5paymentgateways');
    }
}
