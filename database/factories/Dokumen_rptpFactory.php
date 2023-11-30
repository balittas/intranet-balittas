<?php

namespace Database\Factories;

use App\Models\Dokumen_rptp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Dokumen_rptpFactory extends Factory
{
    protected $model = Dokumen_rptp::class;
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
