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
        $tanggalHariIni= Carbon::now();
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        if (auth()->user()->level=='Guru') {
            $idGuru = guru::where('id_user', auth()->user()->id)->first()->no_guru;
            $hafalan=hafalan::where('no_guru', $idGuru)->where ('tanggal','=',Carbon::parse($tanggalHariIni)->format('Y-m-d'))->count();
            $jumlahSiswa=DB::table('siswa')->where('no_guru', $idGuru)->count();
        } else {
            $jumlahSiswa=siswa::count();
            $hafalan=hafalan::where ('tanggal','=',Carbon::parse($tanggalHariIni)->format('Y-m-d'))->count();
        }
        $jumlahGuru=guru::count();

        
        // dd($hafalan);
        $dataHafalan = array();
        $tahun = Carbon::now()->year;
        $datatotal=0;
        
        if(auth()->user()->level == "Siswa"){
            
            $NIS=auth()->user()->siswa->NIS;
            $tahun=\Route::current()->parameter('tahun');
            if($tahun){
                $data=DB::SELECT('SELECT * from totalhafalan where nis ='.$NIS.' and tahun= '.$tahun.' order by tahun, bulan');
            }
            else{
                $data=DB::SELECT('SELECT * from totalhafalan where nis ='.$NIS.' and tahun= '.\Carbon\Carbon::now()->year.' order by tahun, bulan');
            }
            
            // $datatotal = Hafalan::where('nis',$NIS)->groupBy('nis')->get();
            $datatotal=DB::SELECT('SELECT sum(totalHalaman) as totalPendapatan from totalhafalan where nis='.$NIS.' group by nis order by nis');
            // dd($datatotal);
            
            $index = 0;
            for($i = 1; $i <= 12; $i++){
                if($index < count($data)){
                    if($i == $data[$index]->bulan){
                        $dataHafalan[$i]['jmlHafalan']= $data[$index]->totalHalaman / 20;
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
        $surat = "";
        if(auth()->user()->level == "Siswa"){
            $juzAkhir = DB::SELECT('SELECT noJuz, max(noHalamanB) as halaman from hafalanziadah where noJuz in (select max(noJuz) from hafalanziadah where NIS = "'.auth()->user()->siswa->NIS.'")');
            
            $suratJuz = DB::select('select * from surah where noJuzAwal <= '.$juzAkhir[0]->noJuz.' and noJuzAkhir >= '.$juzAkhir[0]->noJuz);
            // $suratJuz = DB::select('select * from surah where noJuzAwal <= 5 and noJuzAkhir >= 5');
            foreach ($suratJuz as $key => $value) {
                if($key == 0 && $value->noJuzAkhir == $juzAkhir[0]->noJuz){
                    if($value->halamanAkhir >= $juzAkhir[0]->halaman){
                        $surat = $value->nama;
                        break;
                    }
                }elseif($key < count($suratJuz) - 1 && $key > 0){
                    if($value->halamanAwal >= $juzAkhir[0]->halaman && $value->halamanAkhir <= $juzAkhir[0]->halaman){
                        $surat = $value->nama;
                        break;
                    }
                }elseif($key == count($suratJuz) - 1){
                    $surat = $value->nama;
                    break;
                }

                
            }
            
        }
        


        return view('backpack::dashboard', $this->data)-> with('jumlahSiswa',$jumlahSiswa)->with('jumlahGuru',$jumlahGuru)->with('hafalan',$hafalan)->with('dataHafalan',$dataHafalan)->with('tahun',$tahun)->with('total', $datatotal)->with('surat',$surat);
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
    public function hapusguru($id){
        return "as";
        $user = User::find($id);
        $user->delete();

        return back();
    }
    
}
