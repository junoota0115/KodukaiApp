<?php

namespace Database\Factories;

use App\Models\Money;
use Illuminate\Database\Eloquent\Factories\Factory;


class MoneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Money::class;

    public function definition()
    {
        return [
            //
            'price'=>$this->faker->randomNumberBetween(10, 50),
            'comment'=>$this->faker->sentence,
        ];
    }
}
