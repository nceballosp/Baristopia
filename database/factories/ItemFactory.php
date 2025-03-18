<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween($min = 0, $max = 10),
            'sub_total' => $this->faker->numberBetween($min = 1000, $max = 10000),
        ];
    }
}