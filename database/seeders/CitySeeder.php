<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Seed the cities table.
     */
    public function run(): void
    {
        City::factory(10)->create();
    }
}
