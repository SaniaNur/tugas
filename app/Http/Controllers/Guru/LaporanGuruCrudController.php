<?php

namespace App\Http\Controllers\Guru;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\LaporanGuruRequest as StoreRequest;
use App\Http\Requests\LaporanGuruRequest as UpdateRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Siswa;

class LaporanGuruCrudController extends CrudController
{
    public function __construct()
    {
        if (! $this->crud) {
            $this->crud = app()->make(CrudPanel::class);

            // call the setup function inside this closure to also have the request there
            // this way, developers can use things stored in session (auth variables, etc)
            $this->middleware([function ($request, $next) {
                $this->request = $request;
                $this->crud->request = $request;
                $this->setup();

                return $next($request);
            },'levelguru']);
        }
    }

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Hafalan');
        $this->crud->setRoute('guru/laporan');
        $this->crud->setEntityNameStrings('Laporan', 'Laporan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

         // $this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField([  // Select2
        //    'label' => "Nama Siswa",
        //    'type' => 'select2',
        //    'name' => 'NIS', // the db column for the foreign key
        //    'entity' => 'siswa', // the method that defines the relationship in your Model
        //    'attribute' => 'nama', // foreign key attribute that is shown to user
        //    'model' => "App\Models\Siswa" // foreign key model
        // ], '/both');
        // $this->crud->addField([ // select_from_array
        //     'name' => 'jenis',
        //     'label' => "Jenis Hafalan",
        //     'type' => 'select2_from_array',
        //     'options' => ['ziadah' => 'Ziadah', 'murojaah' => 'Murojaah'],
        //     'allows_null' => false,
        //     // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        // ], 'both');
        // // $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
        // //     'label' => "Nama Surah",
        // //     'type' => 'select2_multiple',
        // //     'name' => 'surah', // the method that defines the relationship in your Model
        // //     'entity' => 'surah', // the method that defines the relationship in your Model
        // //     'attribute' => 'nama', // foreign key attribute that is shown to user
        // //     'model' => "App\Models\Surah", // foreign key model
        // //     'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        // // ], 'both');
        // // $this->crud->addField([ // Text
        // //         'name' => 'namaIbu',
        // //         'label' => "Nama Ibu",
        // //         'type' => 'text',
        // //         // optional
        // //         //'prefix' => '',
        // //         //'suffix' => ''
        // //     ], 'both');
        // // $this->crud->addField([ // Text
        // //         'name' => 'namaIbu',
        // //         'label' => "Nama Ibu",
        // //         'type' => 'text',
        // //         // optional
        // //         //'prefix' => '',
        // //         //'suffix' => ''
        // //     ], 'both');
        
        // $this->crud->addField([ // Text
        //         'name' => 'noJuz',
        //         'label' => "Juz",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        // $this->crud->addField([ // Text
        //         'name' => 'noHalamanA',
        //         'label' => "Dari Halaman",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        // $this->crud->addField([ // Text
        //         'name' => 'noHalamanB',
        //         'label' => "Sampai Halaman",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        //  $this->crud->addField([ // Text
        //         'name' => 'nilai',
        //         'label' => "Nilai",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        // // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS

        // $this->crud->addColumn([
        //    // 1-n relationship
        //    'label' => "Nama", // Table column heading
            
        //    'name' => 'nama', // the column that contains the ID of that connected entity;
           
        // ]);
        // $this->crud->addColumn([
        //    // 1-n relationship
        //    'label' => "Pendapatan 1 Bulan", // Table column heading
            
        //    'name' => 'nama', // the column that contains the ID of that connected entity;
           
        // ]);
        // $this->crud->addColumn([
        //    // 1-n relationship
        //    'label' => "Nama", // Table column heading
            
        //    'name' => 'nama', // the column that contains the ID of that connected entity;
           
        // ]);
       
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        $this->crud->denyAccess(['create', 'reorder','update','delete']);
// 
        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        $this->crud->addClause('where', 'no_guru', '=', auth()->user()->guru->no_guru);
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
        // $data = DB::select('SELECT max.bln, max.noJuz as juzMax, max.nohalamanB, min.noJuz as juzMin, min.noHalamanA FROM (SELECT noJuz, month(tanggal) as bln, noHalamanB from inputhafalan WHERE day(tanggal) in (SELECT max(day(Tanggal)) from inputhafalan where jenis = "ziadah" and NIS = '.$this->crud->NIS.' GROUP BY month(tanggal)) and jenis = "ziadah" and NIS = '.$this->crud->NIS.') as max join (SELECT noJuz, month(tanggal) as blnMin, noHalamanA from inputhafalan WHERE day(tanggal) in (SELECT min(day(Tanggal)) from inputhafalan where jenis = "ziadah" and NIS = '.$this->crud->NIS.' GROUP BY month(tanggal)) and jenis = "ziadah" and NIS = '.$this->crud->NIS.') as min on max.bln = min.blnMin');
        
        // $index = 0;
        // $this->crud->dataHafalan = array();
        // for($i = 1; $i <= 12; $i++){
        //     if($index < count($data)){
        //         if($i == $data[$index]->bln){
        //             $this->crud->dataHafalan[$i]['jmlHafalan']= ((($data[$index]->juzMax - $data[$index]->juzMin) * 20 - $data[$index]->noHalamanA + $data[$index]->noHalamanB)+1)/20;
        //             $index++;
        //         }else{
        //             $this->crud->dataHafalan[$i]['jmlHafalan']=0;
        //         }
        //     }else{
        //         $this->crud->dataHafalan[$i]['jmlHafalan']=0;
        //     }
        //     $this->crud->dataHafalan[$i]['bln'] = $i;
        // }
        //bln sama tahun blm

        $bulanini=Carbon::now()->format('m');
        $tahunini=Carbon::now()->format('Y');

        $no_guru=auth()->user()->guru->no_guru;
        $tahun=\Route::current()->parameter('tahun');
        $bulan=\Route::current()->parameter('bulan');
        // if($bulan && $tahun){
        //     if($bulan!='null' && $tahun!='null'){
        //     $data = DB::select('SELECT siswa.nama as nama, month(tanggal) as bln,max(noJuz) as juzMax,min(noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM inputhafalan join siswa on siswa.nis=inputhafalan.nis where siswa.no_guru='.$no_guru.' and month(tanggal)='.$bulan.' and year(tanggal)='.$tahun.' group by month(tanggal)-inputhafalan.nis');
        //     }elseif($bulan!='null' && $tahun=='null'){
        //     $data = DB::select('SELECT siswa.nama as nama, month(tanggal) as bln,max(noJuz) as juzMax,min(noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM inputhafalan join siswa on siswa.nis=inputhafalan.nis where siswa.no_guru='.$no_guru.' and month(tanggal)='.$bulan.' group by month(tanggal)-inputhafalan.nis');  
        //     }else{
        //         $data = DB::select('SELECT siswa.nama as nama, month(tanggal) as bln,max(noJuz) as juzMax,min(noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM inputhafalan join siswa on siswa.nis=inputhafalan.nis where siswa.no_guru='.$no_guru.' and year(tanggal)='.$tahun.' group by month(tanggal)-inputhafalan.nis');
        //     }
        // }else{
        //     $data = DB::select('SELECT siswa.nama as nama, month(tanggal) as bln,max(noJuz) as juzMax,min(noJuz) as juzMin,max(noHalamanB) as noHalamanB, min(noHalamanA)as noHalamanA FROM inputhafalan join siswa on siswa.nis=inputhafalan.nis where siswa.no_guru='.$no_guru.' and month(tanggal)='.$bulanini.' and year(tanggal)='.$tahunini.' group by month(tanggal)-inputhafalan.nis');
        // }
        if($tahun !="null" && $tahun!= null){
            $tahunini=$tahun;
        }
        if($bulan != "null" && $bulan != null){
            $bulanini=$bulan;
        }
        $nis = Siswa::where('no_guru', '=', auth()->user()->guru->no_guru)->get();
         $this->crud->data=DB::SELECT('SELECT * from totalhafalan join siswa on siswa.nis=totalhafalan.nis where siswa.no_guru='.$no_guru.' and bulan='.$bulanini.' and tahun= '.$tahunini.' order by totalhafalan.nis');
        $this->crud->datatotal=DB::SELECT('SELECT totalhafalan.nis, sum(totalHalaman) as totalPendapatan from totalhafalan join siswa on siswa.nis=totalhafalan.nis where siswa.no_guru='.$no_guru.' group by totalhafalan.nis order by totalhafalan.nis');
        
        
        // dd($this->crud->data[0]->nis);
        $indexData = 0;
        $indexDataTotal = 0;
        $this->crud->hasil= array();
            foreach ($nis as $key => $value) {
                // dd($value);
                $this->crud->hasil[$key]['nis'] = $value->NIS;
                $this->crud->hasil[$key]['nama'] = $value->nama;
                if($indexData < count($this->crud->data)){
                   if($value->NIS == $this->crud->data[$indexData]->nis){
                        $this->crud->hasil[$key]['totalBulan'] = $this->crud->data[$indexData]->totalHalaman;
                        $indexData ++;
                    }else{
                        $this->crud->hasil[$key]['totalBulan'] = 0;
                    } 
                }else{
                    $this->crud->hasil[$key]['totalBulan'] = 0;
                }
            
            if($indexDataTotal < count($this->crud->datatotal)){
                 if($value->NIS == $this->crud->datatotal[$indexDataTotal]->nis){
                    $this->crud->hasil[$key]['totalPendapatan'] = $this->crud->datatotal[$indexDataTotal]->totalPendapatan;
                    $indexDataTotal++;
                }else{
                    $this->crud->hasil[$key]['totalPendapatan'] = 0;
                }
            }else{
                $this->crud->hasil[$key]['totalPendapatan'] = 0;
            }
        }
        $this->crud->setListView('vendor/backpack/LaporanPencapaianGuru');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
