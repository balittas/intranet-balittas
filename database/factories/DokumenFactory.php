<?php

namespace Database\Factories;

use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DokumenFactory extends Factory
{
    protected $model = Dokumen::class;
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
            'dokumen_file' => $this->faker->imageUrl($width = 640, $height = 640),
            'kategori_id' => Kategori::all()->random()->id,
        ];
    }
}
