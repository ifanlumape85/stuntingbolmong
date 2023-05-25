<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BalitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_puskesmas' => 'required|integer|exists:puskesmas,id',
            'id_kelurahan' => 'required|integer|exists:kelurahan,id',
            // 'posyandu' => 'required|string|max:255',
            // 'rt' => 'required|string|max:255',
            // 'rw' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'bb_lahir' => 'required|integer',
            'tb_lahir' => 'required|integer',
            'nama_orang_tua' => 'required|string|max:255',
        ];
    }
}
