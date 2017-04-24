<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HafalanController extends Controller
{
    //
    public function input(){
        return view('vendor/backpack/hafalan');
    }
}