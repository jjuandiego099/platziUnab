<?php

namespace Database\Seeders;

use App\Models\Reseña;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReseñaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reseña::factory(10)->create();
    }
}
