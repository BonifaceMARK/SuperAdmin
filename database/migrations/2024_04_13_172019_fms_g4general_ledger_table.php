<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fms_g4general_ledger', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->text('account_description')->nullable();
            $table->string('account_type'); // Asset, Liability, Equity, Income, Expense
            $table->decimal('balance', 10, 2)->default(0);
            $table->decimal('transaction_amount', 10, 2)->nullable();
            $table->text('transaction_description')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->dateTime('entry_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_ledger');
    }
};
