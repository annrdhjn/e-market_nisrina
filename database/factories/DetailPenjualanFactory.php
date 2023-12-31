<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPenjualanFactory extends Factory
{
    
    public function definition()
    {
        $id_jual = fake()->randomElement(Penjualan::select('id')->get());
        $id = fake()->randomElement(Barang::select('id')->get());
        $harga = Barang::select('harga_jual')->where('id', $id->id)->first();
        $jumlah = fake()->numberBetween(1, 20);
        return [
            'penjualan_id'=>$id_jual,
            'barang_id'=>$id,
            'harga_jual'=> $harga['harga_jual'],
            'jumlah'=>$jumlah,
            'sub_total'=>$harga->harga_jual * $jumlah
        ];
    }
}
