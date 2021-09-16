<?php

namespace Database\Factories;

use App\Models\salesman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SalesmanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = salesman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'market_id' => rand(1,20),
            'company_id' => rand(1,17),
            'code' => Str::random(6),
        ];
    }
}
