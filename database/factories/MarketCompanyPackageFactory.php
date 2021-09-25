<?php

namespace Database\Factories;

use App\Models\MarketCompanyPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketCompanyPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MarketCompanyPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => rand(2,32),
            'package_id' => rand(7,16),
        ];
    }
}
