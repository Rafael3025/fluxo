<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lancamento>
 */
class LancamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => fake()->numberBetween(1,10),
            'id_tipo' => fake()->numberBetween(1,2),
            'id_centro_custo' => fake()->numberBetween(1,3),
            'valor' => fake()->numberBetween(1,13456),
            'vencimento' => fake()->dateTimeBetween(now(),'+30 week'),
            'descricao' => fake()->word()
        ];
    }
}
