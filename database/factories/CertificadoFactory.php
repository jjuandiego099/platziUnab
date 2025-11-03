<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificados>
 */
class CertificadoFactory extends Factory
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
            'url_certificado' => $this->faker->url(),
            'emitido_en' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
