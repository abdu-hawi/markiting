<?php

namespace Database\Seeders;

use App\Models\salesman;
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
        salesman::factory()->count(297)->create();
    }
}
