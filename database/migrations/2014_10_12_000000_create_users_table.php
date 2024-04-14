<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('userid')->nullable();
            $table->string('firstname')->nullable(); // JAKE TO
            $table->string('lastname')->nullable(); // JAKE TO
            $table->string('email')->unique();
            $table->string('google_id')->nullable(); // JAKE TO
            $table->string('department')->nullable(); // New department column
            $table->integer('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_path_picture')->nullable(); // JAKE TO
            $table->string('user_id')->nullable(); // JAKE TO
            $table->string('age')->nullable(); // JAKE TO
            $table->string('last_ip_loggedin')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Pending', 'Completed', 'Verify', 'Cancelled', 'Suspended', 'Failed', 'Refunded', 'Approve', 'Cancel', 'Delete'])->default('Pending'); // JAKE TO
            $table->date('birthdate')->nullable(); // JAKE TO
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
