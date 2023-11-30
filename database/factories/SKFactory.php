<?php

namespace Database\Factories;

use App\Models\SK;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SKFactory extends Factory
{
    protected $model = SK::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::random(10),
            'nomor_sk' => $this->faker->text(),
            'perihal' => $this->faker->text(),
            'dokumen_file' => $this->faker->imageUrl($width = 640, $height = 640),
        ];
    }
}
