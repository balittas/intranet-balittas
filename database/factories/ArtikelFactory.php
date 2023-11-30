<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\ArtikelKategori;
use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;
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
            'konten' => $this->faker->text(),
            'gambar' => $this->faker->imageUrl($width = 640, $height = 640),
            'slug' => Str::slug($this->faker->text),
            'kategori_artikel_id' => ArtikelKategori::all()->random()->id,
            'dokumen_id' => Dokumen::all()->random()->id,
        ];
    }
}
