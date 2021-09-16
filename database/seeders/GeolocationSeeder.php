<?php

namespace Database\Seeders;

use App\Models\Geolocation;
use Illuminate\Database\Seeder;

class GeolocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Geolocation::factory()->count(17)->create();
    }
}
