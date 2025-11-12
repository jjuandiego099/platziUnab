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
        $imagenesCursos = [
            'https://images.unsplash.com/photo-1519389950473-47ba0277781c', // Programación
            'https://images.unsplash.com/photo-1607746882042-944635dfe10e',
            'https://images.unsplash.com/photo-1521737604893-d14cc237f11d',
            'https://images.unsplash.com/photo-1498050108023-c5249f4df085', // Desarrollo web
            'https://images.unsplash.com/photo-1518770660439-4636190af475',
            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f'  // Emprendimiento
        ];

        return [
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->paragraph(),
            'imagen' => $this->faker->randomElement($imagenesCursos),
            'nivel' => fake()->randomElement(['Básico', 'Intermedio', 'Avanzado']),
            'categoria_id' => Categoria::inRandomOrder()->first()?->id ?? Categoria::factory(),
            'profesor_id' => 2,
        ];
    }
}
