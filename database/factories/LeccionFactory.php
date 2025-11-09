<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecciones>
 */
class LeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'curso_id' => Curso::inRandomOrder()->first()?->id ?? Curso::factory(),
            'titulo' => $this->faker->sentence(4),
            'video_url' => $this->faker->url(),
            'contenido' => $this->faker->paragraph(4),
            'orden' => $this->faker->numberBetween(1, 20),
        ];
    }
}
