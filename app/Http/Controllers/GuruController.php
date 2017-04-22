<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru(){
    	return view('guru.indexGuru');
    }
    public function input_hafalan_guru(){
    	return view('guru.inputHafalanGuru');
    }
    public function program_hafalan_guru(){
    	return view('guru.programHafalanGuru');
    }
    public function history_guru(){
    	return view('guru.historyGuru');
    }
}
