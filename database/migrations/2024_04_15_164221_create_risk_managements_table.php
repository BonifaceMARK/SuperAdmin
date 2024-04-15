<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5risk_managements', function (Blueprint $table) {
            $table->id();
            $table->string('risk_name');
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('status')->default('Pending');
            $table->integer('probability'); // Corrected method call from int to integer
            $table->integer('impact');
            $table->integer('severity');
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
        Schema::dropIfExists('fms_g5risk_managements');
    }
}
