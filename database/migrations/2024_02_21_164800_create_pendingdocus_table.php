<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('f3pendingdocus', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->text('budget')->nullable();
        $table->text('description')->nullable();
        $table->timestamp('submitted_at')->default(now());
        $table->string('reference')->nullable();
        $table->string('submitted_by');
        $table->enum('admin_status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f3pendingdocus');
    }
};
