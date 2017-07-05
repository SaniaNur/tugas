<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class HafalanAPIController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');
        $page = $request->input('page');

        if ($search_term)
        {
            $results = Siswa::where('NIS', 'LIKE', '%'.$search_term.'%')->orwhere('nama', 'LIKE', '%'.$search_term.'%')->paginate(10);
        }
        else
        {
            $results = Siswa::paginate(10);
        }

        return $results;
    }

    public function show($id)
    {
        return Siswa::find($id);
    }
}