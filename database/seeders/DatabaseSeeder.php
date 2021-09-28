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

//        \App\Models\User::factory(20)->create();
////        $this->call(RoleSeeder::class);
//
//
//        $this->call(FixSalesmanSeeder::class);

//        $this->call(GeolocationSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(CompanySeeder::class);
//        $this->call(SalesmanSeeder::class);
//        $this->call(MarketCompanyPackageSeeder::class);

        $this->call(SalesmanStoreSeeder::class);
    }
}
