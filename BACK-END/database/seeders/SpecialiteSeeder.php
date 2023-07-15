<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specialites')->insert([
            'spec_nom' => 'Shirurgien',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'spec_nom' => 'dentiste',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

