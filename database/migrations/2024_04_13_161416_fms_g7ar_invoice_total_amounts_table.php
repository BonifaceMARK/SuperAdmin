<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g7ar_invoice_total_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->decimal('taxable_amount', 10, 2)->nullable();
            $table->string('round_off', 255)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('upload_sign', 255)->nullable();
            $table->string('name_of_the_signatory', 255)->nullable();
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
        Schema::dropIfExists('ar_invoice_total_amounts');
    }
};
