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
        Schema::create('fms_g8users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->string('name', 200);
            $table->text('address');
            $table->text('contact');
            $table->string('username', 100);
            $table->string('password', 200);
            $table->tinyInteger('type')->default(2)->comment('1=admin, 2=staff');
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g8users');
    }
};
