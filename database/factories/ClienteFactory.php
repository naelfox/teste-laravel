<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->email(),
            'telefone' => fake()->e164PhoneNumber(),
            'endereco' => fake()->words(5, true) . ", " . fake()->numberBetween(1, 9999),

        ];
    }
}
