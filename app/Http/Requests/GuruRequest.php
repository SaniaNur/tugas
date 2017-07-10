<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class GuruRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'no_guru'=>'required',
            // 'no_guru' => Rule::unique('guru')->ignore($this->no_guru, 'no_guru'),
            'nama'=>'required',
            'alamat'=>'required',
            'noHp' => ' bail|required|min:10|max:12',
            'password' => 'required|min:6'
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
            'no_guru.required' => 'No. Guru Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'noHp.required' => 'No.Hp Harus Diisi',
            'noHp.min' => 'Masukkan No.Hp Lebih Dari 9',
            'noHp.max' => 'Masukkan No.Hp Kurang Dari 13',
            'password.required' => 'Anda Belum Memasukkan Password',
            'password.min' => 'Masukkan Password Minimal 6 Digit'
        ];
    }
}
