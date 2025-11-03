<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseñas>
 */
class ReseñaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'curso_id' => Curso::inRandomOrder()->first()?->id ?? Curso::factory(),
            'calificacion' => $this->faker->numberBetween(1, 5),
            'comentario' => $this->faker->sentence(12),
        ];
    }
}
