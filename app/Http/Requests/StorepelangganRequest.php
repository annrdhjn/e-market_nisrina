<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepelangganRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

     public function rules()
    {
        return [
            'nama_pelanggan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_pelanggan.required' => 'Data nama pelanggan belum diisi'
        ];
    }
}
