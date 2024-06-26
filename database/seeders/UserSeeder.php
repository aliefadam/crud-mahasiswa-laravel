<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Staff",
            "email" => "staff@gmail.com",
            "password" => bcrypt("123"),
            "roles" => "staff",
        ]);

        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("123"),
            "roles" => "admin",
        ]);
    }
}
