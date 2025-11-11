<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorias = [
    'Programación',
    'Diseño Gráfico',
    'Marketing Digital',
    'Ciberseguridad',
    'Inteligencia Artificial',
    'Desarrollo Web',
    'Gestión de Proyectos',
    'Bases de Datos',
    'Análisis de Datos',
    'Emprendimiento'
];

        return [
             'name' => $this->faker->randomElement($categorias),
        ];
    }
}
