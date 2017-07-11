<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiswaUpdateRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'NIS'=>'required',
            'no_guru'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'alamat'=>'required',
            'namaIbu'=>'required',
            'noHp' => ' bail|required|min:10|max:12'
            // 'name' => 'required|min:5|max:255'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'NIS.required' => 'NIS Harus Diisi',
            'no_guru.required' => 'No. Guru Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'kelas.required' => 'Kelas Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'namaIbu.required' => 'Nama Ibu Harus Diisi',
            'noHp.required' => 'No.Hp Harus Diisi',
            'noHp.min' => 'Masukkan No.Hp Lebih Dari 9',
            'noHp.max' => 'Masukkan No.Hp Kurang Dari 13',
            
        ];
    }
}
