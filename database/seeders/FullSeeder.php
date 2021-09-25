<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Salesman;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        DB::beginTransaction();
        try {
            $type = ["market","company"];
            $amount_type = ["percent","fixed"];
            $store = DB::table('stores')->where('country_id','=',1)->get();
            for ($i=0; $i<7;$i++){

                $tType = $type[rand(0,1)];
                $user = User::query()->insertGetId([
                    'name' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'mobile' => rand(566666666,591111111),
                    'isActive' => rand(0,1),
                    'type' => $tType,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                if ($tType == 'market'){
                    $companyCode = $faker->countryCode;
                    $company = Company::query()->insertGetId([
                        'market_id' => $user,
                        'country_id' => 1,
                        'city_id' => rand(6,45),
                        'geolocation_id' => rand(1,17),
                        'company_code' => $companyCode,
                        'expire_date' => Carbon::now()->addMonth(),
                        'amount_type' => $amount_type[rand(0,1)],
                        'amount' => rand(20,80),
                        'sales_owed' => rand(10,20),
                        'isActive' => rand(0,1),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    $packages = [7,12,13];
                    foreach ($packages as $package){
                        DB::table('market_company_packages')->insertGetId([
                            'company_id' => $company,
                            'package_id' => $package,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
//                $sCnt = rand(2,9);
                    for ($s=0;$s < rand(2,9); $s++){
                        $ss = $store[rand(0,count($store) - 1)];

                        $salesman = User::query()->insertGetId([
                            'name' => $faker->name(),
                            'email' => $faker->unique()->safeEmail(),
                            'email_verified_at' => now(),
                            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                            'remember_token' => Str::random(10),
                            'mobile' => rand(566666666,591111111),
                            'isActive' => rand(0,1),
                            'type' => 'sales',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                        DB::table('salesmen')->insertGetId([
                            'market_id' => $salesman,
                            'company_id' => $user,
                            'code' => $companyCode.Str::random(4),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                        for ($sm=0;$sm<rand(3,15) ; $sm++){
                            $isStorePay = rand(0,1);
                            DB::table('salesman_store')->insertGetId([
                                'company_id' => $user,
                                'package_id' => $package,
                                'salesman_id' => $salesman,
                                'store_id' => $ss->id,
                                'store_data' => $faker->text,
                                'isStorePay' => $isStorePay,
                                'paid_at' => $isStorePay ? Carbon::now() : null,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                                'package_data' => $faker->text,
                            ]);
                        }
                    }
                }
            }
            DB::commit();
        }catch (QueryException $e){
            DB::rollBack();
            dd($e->getMessage());
        }

    }
}
