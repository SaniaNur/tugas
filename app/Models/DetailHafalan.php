<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;


class DetailHafalan extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'detail_hafalan';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id_hafalan','id_surah','ayat','jenisAyat'];
    // protected $hidden = [];
    // protected $dates = ['tanggal'];


    public function hafalan(){
    	return $this-> belongsTo('App\Models\Hafalan');
    }
    public function surah(){
    	return $this-> belongsTo('App\Models\Surah');
    }

}
