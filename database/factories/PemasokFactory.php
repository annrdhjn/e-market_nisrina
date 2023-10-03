<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemasokFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_pemasok' => fake()->company()
        ];
    }
}
