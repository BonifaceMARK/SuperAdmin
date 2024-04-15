<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fms_g5admin_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference_no');
            $table->string('paymentType');
            $table->decimal('amount', 10, 2);
            $table->dateTime('paymentDate');
            $table->text('description')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        // Add six sample data entries
        DB::table('fms_g5admin_payments')->insert([
            [
                'reference_no' =>Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 500.00,
                'paymentDate' => now(),
                'description' => 'Office supplies purchase',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 750.00,
                'paymentDate' => now(),
                'description' => 'Software license renewal',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Salary',
                'amount' => 2000.00,
                'paymentDate' => now(),
                'description' => 'Monthly salary payment',
                'status' => 'Pending'
            ],
            [
                'reference_no' =>Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 1200.00,
                'paymentDate' => now(),
                'description' => 'Office equipment maintenance',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Expense',
                'amount' => 800.00,
                'paymentDate' => now(),
                'description' => 'Marketing campaign expenses',
                'status' => 'Pending'
            ],
            [
                'reference_no' => Str::uuid(),
                'paymentType' => 'Salary',
                'amount' => 1500.00,
                'paymentDate' => now(),
                'description' => 'Bonus payment',
                'status' => 'Pending'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fms_g5admin_payments');
    }
};
