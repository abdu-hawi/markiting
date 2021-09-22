<?php

namespace Database\Seeders;

use App\Models\Salesman;
use Carbon\Carbon;
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
        $sales = Salesman::query()
            ->where('company_id', '=', 9)
            ->latest()->get();
        $store = DB::table('stores')->where('country_id','=',1)->get();
        for ($i=0; $i < count($sales); $i++){
            $c = rand(1,9);
            for ($m=0; $m < $c; $m++){
                $s = $store[rand(0,count($store) - 1)];
                $isStorePay = rand(0,1);
                DB::table('salesman_store')->insert([
                    'company_id' => 9,
                    'package_id' => rand(7,16),
                    'salesman_id' => $sales[$i]->id,
                    'store_id' => ($s)->id,
                    'store_data' => response()->json($s),
                    'isStorePay' => rand(0,1),
                    'paid_at' => $isStorePay ? Carbon::now() : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'package_data' => response()->json($s),
                ]);
            }
        }

    }
}
