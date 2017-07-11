<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use Illuminate\Http\Request;
use App\Http\Requests\HafalanRequest as StoreRequest;
use App\Http\Requests\HafalanRequest as UpdateRequest;
use App\Models\Siswa;
use App\Models\Surah;
use App\Models\Hafalan;
use App\Models\Guru;
use App\Models\Ziadah;
class HafalanCrudController extends CrudController
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
            },'leveladmin']);
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
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hafalan');
        $this->crud->setEntityNameStrings('Input Hafalan', 'Input Hafalan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();
        // $this->crud->dataSiswa=Siswa::get();
        // $this->crud->dataSurah=Surah::get();
        // $this->crud->dataGuru=Guru::get();

        // ------ CRUD FIELDS
        $this->crud->addField([   // date_picker
               'name' => 'tanggal',
               'type' => 'date_picker',
               'label' => 'Tanggal',
               // optional:
               'date_picker_options' => [
                'todayHighlight'=>true,
                  'todayBtn' => 'linked',
                  'format' => 'dd MM yyyy',
                  'language' => 'id',
                  'autoclose'=>true
               ],
            ], 'both');
        $this->crud->addField([  // Select2
           // 1-n relationship
            'label' => "Nama", // Table column heading
            'type' => "select2_ajax_siswa",
            'name' => 'NIS', // the column that contains the ID of that connected entity
            'entity' => 'siswa', // the method that defines the relationship in your Model
            'attribute' => "nama", // foreign key attribute that is shown to user
            'model' => "App\Models\Siswa", // foreign key model
            'data_source' => url("api/siswa"), // url to controller search function (with /{id} should return model)
            'placeholder' => "Pilih Siswa", // placeholder for the select
            'minimum_input_length' => 1, // minimum characters to type before querying results
        ], 'create');
        $this->crud->addField([  // Select2
           'label' => "Nama", // Table column heading
            'type' => "select2_ajax_siswa_edit",
            'name' => 'NIS', // the column that contains the ID of that connected entity
            'entity' => 'siswa', // the method that defines the relationship in your Model
            'attribute' => "nama", // foreign key attribute that is shown to user
            'model' => "App\Models\Siswa", // foreign key model
            'data_source' => url("api/siswa"), // url to controller search function (with /{id} should return model)
            'placeholder' => "Pilih Siswa", // placeholder for the select
            'minimum_input_length' => 1, // minimum characters to type before querying results
        ], 'update');
        $this->crud->addField([ // select_from_array
            'name' => 'jenis',
            'label' => "Jenis Hafalan",
            'type' => 'select2_from_array',
            'options' => [null => '-', 'ziadah' => 'Ziadah', 'murojaah' => 'Murojaah'],
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ], 'both');
        // $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
        //     'label' => "Nama Surah",
        //     'type' => 'select2_multiple',
        //     'name' => 'surah', // the method that defines the relationship in your Model
        //     'entity' => 'surah', // the method that defines the relationship in your Model
        //     'attribute' => 'nama', // foreign key attribute that is shown to user
        //     'model' => "App\Models\Surah", // foreign key model
        //     'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        // ], 'both');
        // $this->crud->addField([ // Text
        //         'name' => 'namaIbu',
        //         'label' => "Nama Ibu",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        // $this->crud->addField([ // Text
        //         'name' => 'namaIbu',
        //         'label' => "Nama Ibu",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
       $this->crud->addField([ // select_from_array
            'name' => 'noJuz',
            'label' => "Juz",
            'type' => 'select2_from_array',
            'options' => [null => '-', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'],
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ], 'both');
        // $this->crud->addField([ // Text
        //         'name' => 'noJuz',
        //         'label' => "Juz",
        //         'type' => 'text',
        //         // optional
        //         //'prefix' => '',
        //         //'suffix' => ''
        //     ], 'both');
        $this->crud->addField([ // Text
                'name' => 'noHalamanA',
                'label' => "Dari Halaman",
                'type' => 'number',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'noHalamanB',
                'label' => "Sampai Halaman",
                'type' => 'number',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');

         $this->crud->addField([ // Text
                'name' => 'nilai',
                'label' => "Nilai",
                'type' => 'number',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        // $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
        //     'label' => "Juz",
        //     'type' => 'select2_multiple',
        //     'name' => 'surah', // the method that defines the relationship in your Model
        //     'entity' => 'surah', // the method that defines the relationship in your Model
        //     'attribute' => 'nama', // foreign key attribute that is shown to user
        //     'model' => "App\Models\Surah", // foreign key model
        //     'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        // ], 'both');
       
        
        
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
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
        $this->crud->denyAccess(['list','update', 'reorder', 'delete']);

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
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
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
        // $this->crud->setListView('vendor/backpack/hafalan');
        
        
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        //$redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        //return $redirect_location;

        // dd($request->jenis);
        
        $hafalan = new Hafalan;
        $hafalan -> noJuz=$request->noJuz;
        $hafalan -> NIS=$request->NIS;
        $hafalan -> jenis=$request->jenis ;
        $hafalan -> noHalamanA=$request->noHalamanA;
        $hafalan -> noHalamanB=$request->noHalamanB;
        $hafalan -> tanggal=$request->tanggal;
        $hafalan -> no_guru=Siswa::where('NIS','=',$request-> NIS)-> first()-> guru-> no_guru;
        $hafalan -> nilai=$request->nilai;

        //udah ada hafalan hari sebelumnyahafalan 
        if($request->jenis == "ziadah"){
            if(Ziadah::where('NIS','=',$request-> NIS)->count()!=0){
                if(Ziadah:: select('totalHalaman')->where('NIS','=',$request-> NIS)->where('tanggal','<',$request->tanggal)->orderBy('tanggal','desc')->first()!=null){
                   $totalKemarin= Ziadah:: select('totalHalaman')->where('NIS','=',$request-> NIS)->where('tanggal','<',$request->tanggal)->orderBy('tanggal','desc')->first()->totalHalaman;
                    $halamanKemarin= Ziadah:: select('noHalamanB')->where('NIS','=',$request-> NIS)->where('tanggal','<',$request->tanggal)->orderBy('tanggal','desc')->first()->noHalamanB;
                    $juzKemarin= Ziadah:: select('noJuz')->where('NIS','=',$request-> NIS)->where('tanggal','<',$request->tanggal)->orderBy('tanggal','desc')->first()->noJuz;
                    //kalau dia kemarin hafalan selesai sampai halaman 20 bisa jadi hari sekarang masih mengulang atau naik juz
                    if($halamanKemarin==20){
                        //naik juz
                        if($juzKemarin==$request->noJuz){
                        $hafalan ->totalHalaman=0;   
                        }else{
                             $hafalan->totalHalaman=$request->noHalamanB-$request->noHalamanA+1;
                         }
                    }else{
                        //ngulang
                        if($totalKemarin==0){ 
                            $tanggalKemarin= Ziadah:: select('tanggal')->where('NIS','=',$request-> NIS)->orderBy('tanggal','desc')->first()->tanggal;
                            $tanggalKemarin= Ziadah:: select('tanggal')->where('NIS','=',$request-> NIS)->where('tanggal','<',$tanggalKemarin)->orderBy('tanggal','desc')->first()->tanggal;
                            $halamanKemarin= Ziadah:: select('noHalamanB')->where('NIS','=',$request-> NIS)->where('tanggal','=',$tanggalKemarin)->orderBy('tanggal','desc')->first()->noHalamanB;
                            // dd($tanggalKemarin);
                        }
                        //second(perkembangannya=0)
                        if(($request->noHalamanB-$halamanKemarin)<=0){
                            $hafalan ->totalHalaman=0;
                        }else{
                            $hafalan ->totalHalaman=$request->noHalamanB-$halamanKemarin;
                        }
                    }
                 
                }else{
                    $hafalan->totalHalaman=$request->noHalamanB-$request->noHalamanA+1;
                }
                
            }else{
                //blm ada hafalan
                $hafalan->totalHalaman=$request->noHalamanB-$request->noHalamanA+1;
            }
        }else{
            $hafalan->totalHalaman = 0;
        }

        $sukses= $hafalan -> save();
        //kurang inputin tanggal kemarin
        if($request->jenis == "ziadah"){
        $tanggalBesok= Ziadah:: select('tanggal')->where('tanggal','>',$request->tanggal)->orderBy('tanggal','asc')->first();
        //inputin hari kemarin (ngecek dulu hari ini udh ada hafalannya atau blm)
        if($tanggalBesok!=null){
            $perbaruiHafalan= Hafalan:: where('jenis','ziadah')->where('NIS','=',$request-> NIS)->where('tanggal',$tanggalBesok->tanggal)->first();
            //
            if($perbaruiHafalan!=null){
                //ngecek sebelumnya ada perkembangan atau tidak
                // dd($perbaruiHafalan->noHalamanB-$request->noHalamanB);
                if($perbaruiHafalan->totalHalaman != 0){
                     if(($perbaruiHafalan->noHalamanB-$request->noHalamanB)<=0){
                        $perbaruiHafalan ->totalHalaman=0;
                    }else{
                        $perbaruiHafalan ->totalHalaman=$perbaruiHafalan->noHalamanB-$request->noHalamanB;
                    }
                }else{
                    $hafalanKemarin= Ziadah::where('tanggal','<',$request->tanggal)->orderBy('tanggal','desc')->first();
                    if(($request->noHalamanB-$hafalanKemarin->noHalamanB)<=0){
                        $perbaruiHafalan ->totalHalaman=0;
                    }else{
                        $perbaruiHafalan ->totalHalaman=$request->noHalamanB-$hafalanKemarin->noHalamanB;
                    }
                }
               
                $perbaruiHafalan->save();
            }   
            } 
        }
        
       
        // if($hafalan->jenis=='ziadah'){
        // $total=\App\Models\TotalPendapatan::where('tahun', substr($hafalan->tanggal,0,4))->where('bulan',substr($hafalan->tanggal,5,2))->where('NIS','=',$hafalan->NIS)->first();
        // //dd($total==null);
        // if($total==null){
        //     $pendapatan = new \App\Models\TotalPendapatan;
        //     $pendapatan->NIS = $request->NIS;
        //     $pendapatan->bulan = substr($hafalan->tanggal,5,2);
        //     $pendapatan->tahun = substr($hafalan->tanggal,0,4);
        //     $pendapatan->totalPendapatan = $request->noHalamanB - $request->noHalamanA +1 ;
        //     $sukses = $pendapatan -> save();
        // }else{
        //     $total ->NIS = $request->NIS;
        //     $total ->bulan = substr($hafalan->tanggal,5,2);
        //     $total ->tahun = substr($hafalan->tanggal,0,4);
        //     $total ->totalPendapatan = $total ->totalPendapatan + $request->noHalamanB - $request->noHalamanA +1;
        //     $sukses= $total->save();
        // }
        // }
        if($sukses){
          \Alert::success('Data Berhasil')->flash();  
        }
        else{
            \Alert::error('Data Gagal Ditambahkan')->flash();
        }
        
        return \Redirect::to('admin/hafalan/create');



    }


    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry

        return $redirect_location;
    }
    
    // public function index(){
    //     return \Redirect::to('admin/hafalan/create')
    // }
}
