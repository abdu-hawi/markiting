<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Salesman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Salesman::factory()->count(297)->create();
        for ($i=32; $i<345;$i++){
            $company = Company::query()->where('id',rand(1,30))->first();
            Salesman::query()->create([
                'market_id' => $i,
                'company_id' => $company->market_id,
                'code' => $company->company_code.''.Str::random(4),
            ]);
        }
    }
}
