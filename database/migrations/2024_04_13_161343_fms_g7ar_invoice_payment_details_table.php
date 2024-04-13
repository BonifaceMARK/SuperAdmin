<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArInvoicePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g7ar_invoice_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->string('account_holder_name', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->bigInteger('ppts_code')->nullable();
            $table->integer('account_number')->nullable();
            $table->string('add_terms_and_conditions', 255)->nullable();
            $table->string('add_notes', 255)->nullable();
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('invoice_id')->references('id')->on('ar_invoice')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_invoice_payment_details');
    }
}
