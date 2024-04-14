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
        Schema::create('fms_g8payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference_no');
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('payee');
            $table->float('amount')->default(0);
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('payment_method_validation')->nullable();
            $table->float('penalty_amount')->default(0);
            $table->tinyInteger('overdue')->default(0)->comment('0=no , 1=yes');
            $table->dateTime('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('loan_id')->references('id')->on('loan_list')->onDelete('cascade');
            // $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g8payments');
    }
};
