<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Hafalan;
use Illuminate\Support\Facades\DB;
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
        $dataHafalan = array();
        if(auth()->user()->level == "Siswa"){
            
            $NIS=auth()->user()->siswa->NIS;
            $tahun=\Route::current()->parameter('tahun');
            if($tahun){
                $data=$data = DB::select('SELECT jumlahHalaman, month(tanggal) as bln,max(inputhafalan.noJuz) as juzMax,min(inputhafalan.noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM `inputhafalan` join juz on inputhafalan.noJuz=juz.noJuz where nis='.$NIS.' and year(tanggal)='.$tahun.' group by month(tanggal)');
            }
            else{
                $data = DB::select('SELECT jumlahHalaman, month(tanggal) as bln,max(inputhafalan.noJuz) as juzMax,min(inputhafalan.noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM `inputhafalan` join juz on inputhafalan.noJuz=juz.noJuz where nis='.$NIS.' group by month(tanggal)');
            }
        
            $index = 0;
            for($i = 1; $i <= 12; $i++){
                if($index < count($data)){
                    if($i == $data[$index]->bln){
                        $dataHafalan[$i]['jmlHafalan']= ((($data[$index]->juzMax - $data[$index]->juzMin) * 20 - $data[$index]->noHalamanA + $data[$index]->noHalamanB)+1)/20;
                        $index++;
                    }else{
                        $dataHafalan[$i]['jmlHafalan']=0;
                    }
                }else{
                    $dataHafalan[$i]['jmlHafalan']=0;
                }
                $dataHafalan[$i]['bln'] = $i;
            }
        }

        return view('backpack::dashboard', $this->data)-> with('jumlahSiswa',$jumlahSiswa)->with('jumlahGuru',$jumlahGuru)->with('hafalan',$hafalan)->with('dataHafalan',$dataHafalan);
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
