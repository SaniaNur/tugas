<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class GuruUpdate extends Model
{
    //
    use CrudTrait;

    protected $table = 'guru';
   protected $primaryKey = 'id_user';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['no_guru','id_user','nama','alamat','noHp'];
    // protected $hidden = [];
    // protected $dates = [];

      public function siswa()
    {
        return $this->hasMany('App\Models\Siswa','no_guru');
    }
    public function hafalan()
    {
        return $this->hasMany('App\Models\Hafalan','id_hafalan');
    }
}
