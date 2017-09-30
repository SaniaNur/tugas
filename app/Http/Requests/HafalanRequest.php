<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Siswa;
class HafalanRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
        $noguru = 0;
        if($this->NIS != null){
            $noguru = Siswa::find($this->NIS)->no_guru;
        }
        return [
            'tanggal'=>'required',
            'NIS'=>'required|guruKosong:'.$noguru,
            'jenis'=>'required',
            'noJuz'=>'required|numeric',
            'noHalamanA'=>'required',
            'noHalamanB'=>'required',
            'nilai'=>'required',
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
            'tanggal.required' => 'Tanggal Harus Diisi',
            'NIS.required' => 'Nama Siswa Harus Diisi',
            'jenis.required' => 'Jenis Hafalan Harus Diisi',
            'noJuz.required' => 'Juz Harus Diisi',
            'noHalamanA.required' => 'Dari Halaman Harus Diisi',
            'noHalamanB.required' => 'Sampai Halaman Harus Diisi',
            'nilai.required' => 'Nilai Harus Diisi',
            'NIS.guru_kosong'=>'Siswa Tidak Memiliki Guru Pembimbing. Silahkan Ubah Guru Pembimbing Pada Data Siswa',
            
            //
        ];
    }
}
