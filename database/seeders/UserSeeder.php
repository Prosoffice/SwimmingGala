<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            'first_name'=>'Prosper',
            'last_name'=>'Ogb',
            'password'=>bcrypt("password"),
            'role_id'=>1,
            'email'=>'prosper@gmail.com'
        ]);
    }
}
