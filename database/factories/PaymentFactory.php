<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'method' => $this->faker->randomElement(['Tarjeta de Crédito', 'PayPal', 'Transferencia Bancaria']),
            'status' => $this->faker->randomElement(['Pendiente', 'Pagado', 'Fallido']),
        ];
    }
}