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
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'department' => 'IT',
                'role' => 0, // Role 0: Default role
                'password' => Hash::make('password'),
                'last_ip_loggedin' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'department' => 'HR',
                'role' => 1, // Role 1: HR role
                'password' => Hash::make('password'),
                'last_ip_loggedin' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'department' => 'Admin',
                'role' => 2, // Role 2: Admin role
                'password' => Hash::make('password'),
                'last_ip_loggedin' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users with different roles as needed
        ];

        // Insert data into the users table
        DB::table('users')->insert($users);
    }
}
