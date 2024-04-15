<?php
// FixedAssetPaymentsSeeder.php

namespace Database\Seeders;

use App\Models\FixedAssetPayment;
use Illuminate\Database\Seeder;

class FixedAssetPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FixedAssetPayment::factory()->count(10)->create();
    }
}
