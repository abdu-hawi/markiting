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

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        DB::beginTransaction();
        try {
            User::query()->create([
                'name' => $faker->name(),
                'email' => 'm@m.m',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'mobile' => rand(566666666,591111111),
                'isActive' => 1,
                'type' => 'market',
            ]);
            for ($i=1;$i<31;$i++){
                User::query()->create([
                    'name' => $faker->name(),
                    'email' => 'c'.$i.'@c.c',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'mobile' => rand(566666666,591111111),
                    'isActive' => rand(0,1),
                    'type' => 'company',
                ]);
            }
            for ($i=1;$i<314;$i++){
                User::query()->create([
                    'name' => $faker->name(),
                    'email' => 's'.$i.'@s.s',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'mobile' => rand(566666666,591111111),
                    'isActive' => rand(0,1),
                    'type' => 'company',
                ]);
            }
            DB::commit();
        }catch (QueryException $e){
            DB::rollBack();
            dd($e->getMessage());
        }

    }
}
