<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'qty' => $this->faker->numberBetween(1, 1000),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
