<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index_siswa(){
    	 return view('siswa.indexSiswa');
    }
    public function tabel_hasil(){
    	return view('siswa.tableHasil');
    }
}
