<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->sentence(),
            'descripción' =>  $this->faker->text(),
            'image' => $this->faker->url(),
            'price' => 2000,
            'active' => 1,
        ];
    }
}
