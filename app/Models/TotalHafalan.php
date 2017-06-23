<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;


class TotalHafalan extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'totalhafalan';
    protected $primaryKey = 'nis';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['nis','bulan','tahun','totalHalaman'];
    // protected $hidden = [];
    // protected $dates = ['tanggal'];

}
