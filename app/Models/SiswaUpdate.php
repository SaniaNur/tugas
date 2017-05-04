<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class SiswaUpdate extends Model
{
    //
    use CrudTrait;

    protected $table = 'siswa';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['NIS','id_user','no_guru','nama','kelas','alamat','noHp','namaIbu'];
    // protected $hidden = [];
    // protected $dates = [];

     public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'no_guru');
    }
}
