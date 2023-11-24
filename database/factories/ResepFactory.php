<?php

namespace Database\Factories;

use App\Models\Resep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resep>
 */
class ResepFactory extends Factory
{
    protected $model = Resep::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "judul" => $this->faker->unique()->word(mt_rand(1,2)),
            "kategori_id" => mt_rand(1,4),
            "waktu_masak" => "10 Menit",
            "bahan" => $this->faker->paragraph(mt_rand(2,3)),
            "intruksi" => $this->faker->paragraph(mt_rand(2,3)),
        ];
    }
}
