<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreightPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_payments', function (Blueprint $table) {
            $table->id();
            $table->string('freightService');
            $table->decimal('freightAmount', 10, 2);
            $table->dateTime('freightDate');
            $table->text('freightDescription')->nullable();
            $table->string('freightStatus');
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
        Schema::dropIfExists('freight_payments');
    }
}

