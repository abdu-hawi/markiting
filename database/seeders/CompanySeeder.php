<?php

namespace Database\Seeders;

use App\Models\Company;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
//        Company::factory()->count(17)->create();
        $amount_type = ["percent","fixed"];
        $cnt = 0;
        for ($i=2;$i<32;$i++){
            $c = "C";
            if ($i > 9 && $i < 20) {
                $c = "D";
                if ($i == 10 )$cnt = 0;
            }
            elseif ($i > 19 && $i < 30) {
                $c = "E";
                if ($i == 20 )$cnt = 0;
            }
            elseif ($i > 29 && $i < 40) {
                $c = "F";
                if ($i == 30 )$cnt = 0;
            }
            Company::query()->create([
                'market_id' => $i,
                'country_id' => 1,
                'city_id' => rand(6,45),
                'geolocation_id' => rand(1,17),
                'company_code' => $c.$cnt ,
                'expire_date' => Carbon::now()->addMonth(),
                'amount_type' => $amount_type[rand(0,1)],
                'amount' => rand(20,80),
                'sales_owed' => rand(10,20),
                'isActive' => rand(0,1),
            ]);
            $cnt++;
        }
    }
}
