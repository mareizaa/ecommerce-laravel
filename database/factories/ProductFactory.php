<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => 1,
            'reference' => Str::random(5),
            'name' => $this->faker->sentence(2, true),
            'description' => $this->faker->text(100),
            'price' => $this->faker->randomDigitNotZero(),
            'status' => true,
            'quantity' => $this->faker->randomDigitNotZero(),
        ];
    }
}
