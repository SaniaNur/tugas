<?php

namespace App\Http\Controllers\Guru;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\HafalanRequest as StoreRequest;
use App\Http\Requests\HafalanRequest as UpdateRequest;
use App\Models\Siswa;
use App\Models\Surah;
use App\Models\Hafalan;
use App\Models\Guru;
class HafalanGuruCrudController extends CrudController
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
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hafalan');
        $this->crud->setEntityNameStrings('Input Hafalan', 'Input Hafalan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();
        $this->crud->dataSiswa=Siswa::where ('no_guru','=',1)->get();
        $this->crud->dataSurah=Surah::get();
        $this->crud->dataGuru=Guru::get();

        // ------ CRUD FIELDS
        $this->crud->addField([  // Select2
           'label' => "Nama Siswa",
           'type' => 'select2',
           'name' => 'NIS', // the db column for the foreign key
           'entity' => 'siswa', // the method that defines the relationship in your Model
           'attribute' => 'nama', // foreign key attribute that is shown to user
           'model' => "App\Models\Siswa" // foreign key model
        ], '/both');
        $this->crud->addField([ // select_from_array
            'name' => 'jenis',
            'label' => "Jenis Hafalan",
            'type' => 'select2_from_array',
            'options' => ['ziadah' => 'Ziadah', 'murojaah' => 'Murojaah'],
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
        
        $this->crud->addField([ // Text
                'name' => 'awal',
                'label' => "AWAL :",
                'type' => 'label',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Nama Surah",
            'type' => 'select2_multiple',
            'name' => 'surah', // the method that defines the relationship in your Model
            'entity' => 'surah', // the method that defines the relationship in your Model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            'model' => "App\Models\Surah", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ], 'both');
        $this->crud->addField([ // Text
                'name' => 'ayat',
                'label' => "Ayat",
                'type' => 'number',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'akhir',
                'label' => "AKHIR :",
                'type' => 'label',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Nama Surah",
            'type' => 'select2_multiple',
            'name' => 'surah', // the method that defines the relationship in your Model
            'entity' => 'surah', // the method that defines the relationship in your Model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            'model' => "App\Models\Surah", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ], 'both');
        $this->crud->addField([ // Text
                'name' => 'ayat',
                'label' => "Ayat",
                'type' => 'number',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
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
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

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
        $this->crud->setListView('vendor/backpack/hafalan');
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
    public function tambahHafalan(Request $request){
        $hafalan = new Hafalan;
        $hafalan -> NIS=$request-> NIS;
        $hafalan -> jenis=$request-> jenis ;
        $hafalan -> tanggal=date('Y-m-d',strtotime($request-> tanggal));
        $hafalan -> no_guru=Siswa::where('NIS','=',$request-> NIS)-> first()-> guru-> no_guru;
        $hafalan -> save(); 

        $sukses=\DB::table('detail_hafalan')->insert([[
            'id_hafalan'=> $hafalan-> id_hafalan,
            'id_surah'=>$request-> surahAwal,
            'ayat'=>$request-> ayatAwal,
            'jenisAyat'=>'awal'
            ],[
            'id_hafalan'=> $hafalan-> id_hafalan,
            'id_surah'=>$request-> surahAkhir,
            'ayat'=>$request-> ayatAkhir,
            'jenisAyat'=>'akhir'
            ]]);
        if($sukses){
          \Alert::success('Data Berhasil')->flash();  
        }
        else{
            \Alert::error('Data Gagal Ditambahkan')->flash();
        }
        return \Redirect::to('admin/hafalan');



    }


}
