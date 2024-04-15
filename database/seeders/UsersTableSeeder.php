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
        // Sample user data with different roles
        $users = [
            ['name' => 'superadmin', 'email' => 'superadmin@gmail.com', 'password' => 'admin123', 'role' => 0],
            ['name' => 'admin1', 'email' => 'g1_admin@gmail.com', 'password' => 'admin123', 'role' => 1],
            ['name' => 'admin2', 'email' => 'g2_admin@gmail.com', 'password' => 'admin123', 'role' => 2],
            ['name' => 'admin3', 'email' => 'g3_admin@gmail.com', 'password' => 'admin123', 'role' => 3],
            ['name' => 'admin4', 'email' => 'g4_admin@gmail.com', 'password' => 'admin123', 'role' => 4],
            ['name' => 'admin5', 'email' => 'g5_admin@gmail.com', 'password' => 'admin123', 'role' => 5],
            ['name' => 'admin6', 'email' => 'g6_admin@gmail.com', 'password' => 'admin123', 'role' => 6],
            ['name' => 'admin7', 'email' => 'g7_admin@gmail.com', 'password' => 'admin123', 'role' => 7],
            ['name' => 'admin8', 'email' => 'g8_admin@gmail.com', 'password' => 'admin123', 'role' => 8],
            ['name' => 'admin9', 'email' => 'g9_admin@gmail.com', 'password' => 'admin123', 'role' => 9],
            ['name' => 'admin10', 'email' => 'g10_admin@gmail.com', 'password' => 'admin123', 'role' => 10],
            ['name' => 'employee', 'email' => 'employee@gmail.com', 'password' => 'admin123', 'role' => 11],
        ];

        // Insert each user into the database
        foreach ($users as $user) {
            // Hash the password
            $user['password'] = Hash::make($user['password']);

            DB::table('users')->insert($user);
        }


    }
}
