<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArInvoiceCustomerNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g7ar_invoice_customer_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('customer_name')->nullable();
            $table->unsignedBigInteger('po_number')->nullable();
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('enable_tax')->nullable();
            $table->string('recurring_invoice')->nullable();
            $table->string('by_month')->nullable();
            $table->string('month')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->longText('invoice_from')->nullable();
            $table->longText('invoice_to')->nullable();
            $table->longText('status')->nullable();
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            // $table->foreign('po_number')->references('id')->on('purchase_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_invoice_customer_names');
    }
}
