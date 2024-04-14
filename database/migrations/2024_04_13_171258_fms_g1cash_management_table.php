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
        Schema::create('fms_g1cash_management', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->decimal('revenue', 10, 2)->default(0);
            $table->decimal('income', 10, 2)->default(0);
            $table->decimal('outflow', 10, 2)->default(0);
            $table->decimal('net_income', 10, 2)->default(0);
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
        Schema::dropIfExists('fms_g1cash_management');
    }
};
