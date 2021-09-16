<?php

namespace Database\Seeders;

use App\Models\MarketCompanyPackage;
use Illuminate\Database\Seeder;

class MarketCompanyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarketCompanyPackage::factory()->count(97)->create();
    }
}
