<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's Roles.
     */
    public function run(): void
    {
        DB::table("roles")->insert(
            ['name'=>'SuperAdmin']
        );
        DB::table("roles")->insert(
            ['name'=>'Guardian']
        );
        DB::table("roles")->insert(
            ['name'=>'Swimmer']
        );
        DB::table("roles")->insert(
            ['name'=>'Coach']
        );

    }
}

