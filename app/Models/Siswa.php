<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Siswa extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['NIS','id_user','no_guru','nama','jenisKelamin','kelas','alamat','noHp','namaIbu'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS  
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'no_guru');
    }
    public function hafalan()
    {
        return $this->hasMany('App\Models\Hafalan', 'id_hafalan');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
