<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Hafalan;
use Carbon\Carbon;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $jumlahSiswa=siswa::count();
        $jumlahGuru=guru::count();
        $tanggalHariIni= Carbon::now();

        $hafalan=hafalan::where ('tanggal','=',Carbon::parse($tanggalHariIni)->format('Y-m-d'))->count();
        // dd($hafalan);

        return view('backpack::dashboard', $this->data)-> with('jumlahSiswa',$jumlahSiswa)->with('jumlahGuru',$jumlahGuru)->with('hafalan',$hafalan);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect('/dashboard');
    }
}
