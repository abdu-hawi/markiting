<?php

namespace Database\Factories;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount_type = ["percent","fixed"];
        return [
            'market_id' => rand(1,20),
            'country_id' => 1,
            'city_id' => rand(6,45),
            'geolocation_id' => rand(1,17),
            'company_code' => $this->faker->countryCode,
            'expire_date' => Carbon::now()->addMonth(),
            'amount_type' => $amount_type[rand(0,1)],
            'amount' => rand(20,80),
            'sales_owed' => rand(10,20),
            'isActive' => rand(0,1),
        ];
    }
}
