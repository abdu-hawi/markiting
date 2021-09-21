<?php

namespace Database\Seeders;

use App\Models\Salesman;
use Illuminate\Database\Seeder;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salesman::factory()->count(297)->create();
    }
}
