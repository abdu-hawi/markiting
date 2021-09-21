<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(GeolocationSeeder::class);
//        \App\Models\User::factory(20)->create();
////        $this->call(RoleSeeder::class);
//        $this->call(CompanySeeder::class);
//        $this->call(SalesmanSeeder::class);
//        $this->call(MarketCompanyPackageSeeder::class);
        $this->call(SalesmanStoreSeeder::class);
    }
}
