<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Ziadah extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'inputhafalan';
    protected $primaryKey = 'id_hafalan';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['noJuz','NIS','no_guru','jenis','noHalamanA','noHalamanB','tanggal','nilai'];
    // protected $hidden = [];
    // protected $dates = ['tanggal'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    // protected $casts = [
    //     'tanggal' => 'date',
    // ];
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    // public function siswa()
    // {
    //     return $this->belongsTo('App\Models\Siswa', 'NIS');
    // }
    // public function guru()
    // {
    //     return $this->belongsTo('App\Models\Guru', 'no_guru');
    // }
   
    // public function setTanggalAttribute($value){
    //     $this->attributes['tanggal']=Carbon::createFromFormat('mm/dd/yyyy', $value)->toDateString;
    // }

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
