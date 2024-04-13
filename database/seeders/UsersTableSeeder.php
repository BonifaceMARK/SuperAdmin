<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Define sample user data with different roles
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 0, // Assuming role 0 is for regular users
            'status' => 'Active',
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

    }
}
