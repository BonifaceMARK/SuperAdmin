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
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 0, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'g1_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 1, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'g2_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 2, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin3',
            'email' => 'g3_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 3, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin4',
            'email' => 'g4_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 4, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin5',
            'email' => 'g5_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 5, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin6',
            'email' => 'g6_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 6, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin7',
            'email' => 'g7_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 7, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin8',
            'email' => 'g8_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 8, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin9',
            'email' => 'g9_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 9, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'admin10',
            'email' => 'g10_admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 10, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

        DB::table('users')->insert([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 11, // Assuming role 0 is for regular users
            // Add more fields as needed
            // Ensure that the fields you're populating align with the columns defined in your migration
        ]);

    }
}
