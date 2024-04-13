<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g7vendors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->integer('contact_no')->nullable();
            $table->string('city', 255)->nullable();
            $table->bigInteger('zip_code')->nullable();
            $table->string('region', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_due')->nullable();
            $table->string('payment_method', 255)->nullable();
            $table->string('payment_term', 255)->nullable();
            $table->string('signature', 255)->nullable();
            $table->string('bir_2302', 255)->nullable();
            $table->string('sec_dti_reg', 255)->nullable();
            $table->string('business_perm', 255)->nullable();
            $table->string('accred_docu', 255)->nullable();
            $table->string('other_docu', 255)->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
