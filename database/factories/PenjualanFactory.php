<?php

namespace Database\Factories;

use App\Models\pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanFactory extends Factory
{
    public function definition()
    {
        return [
            'no_faktur'=>'P'.sprintf('%08d', fake()->unique()->numberBetween(1,99999999)),
            'tgl_faktur'=> '2022-'.fake()->numberBetween(1,12).'-'.fake()->numberBetween(1, 30),
            'total_bayar'=>fake()->numberBetween(1000, 1000000),
            'pelanggan_id'=>fake()->randomElement(Pelanggan::select('id')->get()),
            'user_id'=>1
        ];
    }
}
