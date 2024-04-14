<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\UserDescription;

class UserDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserDescription::insert([
            ['id' => 1, 'usertype' => 0, 'userdesc' => 'Super Administrator', 'created_at' => '2024-03-08 16:00:00', 'updated_at' => '2024-03-08 16:00:00'],
            ['id' => 2, 'usertype' => 1, 'userdesc' => 'Administrator', 'created_at' => '2024-03-09 02:46:29', 'updated_at' => '2024-03-09 02:46:31'],
            // Insert other rows here
        ]);
    }
}






