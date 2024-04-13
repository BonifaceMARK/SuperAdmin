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
        Schema::create('fms_g7ap_pending_invoice_approval', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approval_id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('company_name', 255);
            $table->string('gender', 255);
            $table->string('fee_types', 255);
            $table->string('amount', 255);
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->string('status', 255);
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('ap_pending_invoice_approval');
    }
};
