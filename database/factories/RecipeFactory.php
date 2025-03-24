<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'ingredients' => $this->faker->randomElement([
                'Café molido, Agua, Azúcar',
                'Café en grano, Leche, Canela',
                'Café instantáneo, Agua caliente, Crema',
                'Espresso, Leche vaporizada, Chocolate',
                'Café filtrado, Miel, Jengibre',
                'Café negro, Cardamomo, Azúcar moreno',
            ]),
            'description' => $this->faker->sentence,
            'image' => $this->faker->image,
        ];
    }
}
