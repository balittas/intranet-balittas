<?php

namespace Database\Factories;

use App\Models\Dokumen_rdhp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Dokumen_rdhpFactory extends Factory
{
    protected $model = Dokumen_rdhp::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::random(10),
            'judul' => $this->faker->text(),
            'penanggung_jawab' => User::all()->random()->name,
            'dokumen_file' => $this->faker->imageUrl($width = 640, $height = 640),
        ];
    }
}
