<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fms_g4compliance', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->string('regulatory_requirement');
            $table->boolean('compliant')->default(false);
            $table->text('notes')->nullable();
            $table->dateTime('checked_at')->nullable();
            $table->string('compliance_officer')->nullable();
            $table->dateTime('next_check_date')->nullable();
            $table->string('evidence')->nullable();
            $table->string('audit_trail')->nullable();
            $table->string('financial_regulator')->nullable();
            $table->string('reporting_frequency')->nullable();
            $table->string('reporting_deadline')->nullable();
            $table->string('penalty')->nullable();
            $table->decimal('fine_amount', 10, 2)->nullable();
            $table->string('fine_currency')->nullable();
            $table->string('compliance_status')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compliance');
    }
};
