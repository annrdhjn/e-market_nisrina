<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pelanggan>
 */
class PelangganFactory extends Factory
{
    public function definition()
    {
        return [
            'kode_pelanggan'=>'PL'.sprintf('%08d', fake()->unique()->numberBetween(1,99999999)),
            'nama_pelanggan'=>fake()->name($gender = null|'male'|'female'),
            'alamat'=>fake()->address(),
            'email'=>fake()->email(),
            'no_telp'=>fake()->phoneNumber(),
        ];
    }
}
