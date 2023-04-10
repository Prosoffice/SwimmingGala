<?php

namespace Database\Seeders;

use App\Models\Squad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SquadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $squad = Squad::create([
            'name'=>'Squad 1',
            'coach_id'=>2
        ]);
    }
}
