<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

        foreach ($categorias as $categoria) {
            Categoria::create([
                'name' => $categoria
            ]);
        }
    }
}
