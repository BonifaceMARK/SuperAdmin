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
        Schema::create('fms_g8loan_list', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference_no');
            $table->unsignedBigInteger('loan_type_id');
            $table->unsignedBigInteger('borrower_id');
            $table->text('purpose');
            $table->double('amount');
            $table->unsignedBigInteger('plan_id');
            $table->tinyInteger('status')->default(0)->comment('0=request, 1=confirmed, 2=released, 3=completed, 4=denied');
            $table->dateTime('date_released');
            $table->dateTime('date_created')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('loan_type_id')->references('id')->on('loan_types')->onDelete('cascade');
            // $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');
            // $table->foreign('plan_id')->references('id')->on('loan_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_list');
    }
};
