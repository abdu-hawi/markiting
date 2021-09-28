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
            ->where('company_id', '=', 2)
            ->latest()->get();
        $store = DB::table('stores')->where('country_id','=',1)->get();
        $packages = DB::table('packages')
            ->where('is_special','=',0)
            ->where('active','=',1)
            ->where('locale','=','ar')
            ->join('package_translations','package_translations.package_id','=','packages.id')
            ->select([
                'packages.id as id',
                'name',
                'period',
                'period_type',
            ])
            ->get();
        for ($i=0; $i < count($sales); $i++){
            $c = rand(1,9);
            for ($m=0; $m < $c; $m++){
                $p = $packages[rand(0,count($packages) - 1)];
                $s = $store[rand(0,count($store) - 1)];
                $isStorePay = rand(0,1);
                DB::table('salesman_store')->insert([
                    'company_id' => 2,
                    'package_id' => $p->id,
                    'salesman_id' => $sales[$i]->id,
                    'store_id' => ($s)->id,
                    'store_data' => json_encode($s),
                    'isStorePay' => $isStorePay,
                    'paid_at' => $isStorePay ? Carbon::now() : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'package_data' => json_encode($p),
                ]);
            }
        }

    }
}
