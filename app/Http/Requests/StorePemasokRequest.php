<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasokRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pemasok' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_pemasok.required' => 'Data nama pemasok belum diisi'
        ];
    }
}
