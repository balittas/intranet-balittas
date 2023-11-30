<?php

namespace Database\Factories;

use App\Models\ArtikelKategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArtikelKategoriFactory extends Factory
{
    protected $model = ArtikelKategori::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::random(10),
            'nama' => $this->faker->text(),
        ];
    }
}
