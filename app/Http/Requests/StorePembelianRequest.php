<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kode_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'kode_masuk' => 'required',
            'totalHarga' => 'required',
            'pemasok_id' => 'required',
            'barang_id' => 'required',
            'harga_beli' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required',
        ];
    }
}
