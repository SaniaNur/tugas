<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if (auth::user()->level == "admin") {
            return view('admin.dashboard');
        }elseif (auth::user()->level == "guru") {
            return view('guru.indexGuru');
        }else{
            return view('siswa.indexSiswa');
        }
    }
    public function dataguru(){
        return view('admin.dataguru');
    }
    public function detail_guru(){
        return view('detailguru');
    }
    public function tambah_guru(){
        return view('admin.tambahguru');
    }
    public function ubah_guru(){
        return view('admin.ubahguru');
    }
    public function datasiswa(){
        return view('admin.datasiswa');
    }
    public function detail_siswa(){
        return view('admin.detailsiswa');
    }
    public function tambah_siswa(){
        return view('admin.tambahsiswa');
    }
     public function ubah_siswa(){
        return view('admin.ubahsiswa');
    }
     public function daftar_juz(){
        return view('admin.juz');
    }
     public function input(){
        return view('admin.inputhafalan');
    }
     public function program_hafalan(){
        return view('admin.programhafalan');
    }
     public function history(){
        return view('admin.historyhafalan');
    }
}
