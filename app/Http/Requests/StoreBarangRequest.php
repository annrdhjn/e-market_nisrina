<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_barang' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Data nama barang belum diisi'
        ];
    }
}
