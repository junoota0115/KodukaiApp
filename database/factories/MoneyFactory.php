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
            'user_id' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(1000, 100000),
            'comment'=>$this->faker->sentence,
        ];
    }
}
