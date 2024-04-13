<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTrailTable extends Migration
{
    public function up()
    {
        Schema::create('fms_g4audit_trail', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->string('entity_id');
            $table->string('action'); // Created, Updated, Deleted
            $table->text('old_data')->nullable();
            $table->text('new_data')->nullable();
            $table->string('user_id')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_trail');
    }
}
