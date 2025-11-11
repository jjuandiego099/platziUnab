<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Leccion;
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
        // Listas base
        $titulos = [
            'Introducción al curso',
            'Conceptos fundamentales',
            'Ejercicios prácticos',
            'Proyecto final',
        ];

        $contenidos = [
            'Bienvenida, objetivos y estructura general del curso.',
            'Explicación detallada de los conceptos más importantes.',
            'Aplicación práctica con ejercicios guiados.',
            'Proyecto final integrador del curso.',
        ];

        $videos = [
            'https://www.youtube.com/watch?v=jD12EKtDJTU',
            'https://www.youtube.com/watch?v=C7NLf7K7hLA',
            'https://www.youtube.com/watch?v=N6CaTO0Fu7g',
            'https://www.youtube.com/watch?v=kE_xGe0A2mc',
        ];

        // Selecciona un índice aleatorio (0-3)
        $i = $this->faker->numberBetween(0, 3);

        // ✅ Retorna exactamente un array
        return [
            'curso_id'  => Curso::inRandomOrder()->first()?->id ?? Curso::factory(),
            'titulo'    => $titulos[$i],
            'video_url' => $videos[$i],
            'contenido' => $contenidos[$i],
            'orden'     => $i + 1,
        ];
    }
}
