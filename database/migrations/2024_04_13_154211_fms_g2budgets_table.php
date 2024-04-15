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
        Schema::create('fms_g2budgets', function (Blueprint $table) {
            $table->id();

            $table->uuid('reference_no');
            $table->string('title');

            $table->text('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('department');
            $table->string('name');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Added 'status' field with a default value of 'pending'
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
        Schema::dropIfExists('fms_g2budgets');
    }
};
