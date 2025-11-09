<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cursos>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->paragraph(),
            'imagen' => fake()->imageUrl(640, 480, 'education', true, 'Curso'),
            'nivel' => fake()->randomElement(['Básico', 'Intermedio', 'Avanzado']),
            'categoria_id' => Categoria::inRandomOrder()->first()?->id ?? Categoria::factory(),
            'profesor_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
