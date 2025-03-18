<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'summary' => $this->faker->sentence,
            'total' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'total_quantity' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}