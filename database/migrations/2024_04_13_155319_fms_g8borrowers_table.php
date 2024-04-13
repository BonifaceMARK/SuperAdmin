<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g8borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('middlename', 100);
            $table->string('lastname', 100);
            $table->string('contact_no', 30);
            $table->text('address');
            $table->string('email', 50);
            $table->string('tax_id', 50);
            $table->unsignedBigInteger('valid_ids')->nullable();
            $table->integer('crdt_limit');
            $table->integer('type_credit');
            $table->integer('credit_amount');
            $table->integer('approval');
            $table->integer('client_status');
            $table->dateTime('date_updated')->nullable();
            $table->dateTime('date_created')->nullable();
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
        Schema::dropIfExists('borrowers');
    }
}
