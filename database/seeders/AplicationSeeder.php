<?php

namespace Database\Seeders;

use App\Models\Aplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aplication::factory()->count(20)->create();
    }
}
