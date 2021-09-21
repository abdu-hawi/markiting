<?php

namespace Database\Seeders;

use App\Models\Salesman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesmanStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        salesman::factory()->count(297)->create();
//        $sales = Salesman::query()
//            ->where('company_id', '=', 9)
//            ->get();
//        $store = DB::table('stores')->where('country_id','=',1)->get();
//        for ($i=0; $i > 14; $i++){
//            $c = rand(2,9);
//            for ($m=0; $m > $c; $m++){
//                $s = $store[rand(0,count($store))];
//                DB::table('salesman_store')->insertOrIgnore([
//                    'company_id' => 9,
//                    'package_id' => rand(7,16),
//                    'salesman_id' => $sales[$i],
//                    'store_id' => 3,
//                    'store_data' => $s,
//                    'isStorePay' => rand(0,1),
//                    'package_data' => $s,
//                ]);
//            }
//        }

        DB::table('salesman_store')->insertOrIgnore([
            'company_id' => 9,
            'package_id' => rand(7,16),
            'salesman_id' => 3,
            'store_id' => 3,
            'store_data' => "dsdsd",
            'isStorePay' => rand(0,1),
            'package_data' => "dsdsd",
        ]);
    }
}
