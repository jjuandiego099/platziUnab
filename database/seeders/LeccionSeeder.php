<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Curso::all() as $curso) {
            Leccion::factory(4)->create([
                'curso_id' => $curso->id,
            ]);
        }
    }
}
