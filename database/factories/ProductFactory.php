<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->sentence(2, true),
            'descripción' => $this->faker->text(100),
            'price' => $this->faker->randomDigitNotZero(),
            'status' => true,
            'quantity' => $this->faker->randomDigitNotZero(),
        ];
    }
}
