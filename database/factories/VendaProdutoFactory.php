<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendaProduto>
 */
class VendaProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'venda_id' => Venda::all()->random()->id,
            'produto_id' => Produto::all()->random()->id,
            'produto_quantidade' => fake()->numberBetween(1, 100),
        ];
    }
}
