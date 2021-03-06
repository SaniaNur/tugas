<?php

namespace App\Http\Controllers\Siswa;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\HistoryRequest as StoreRequest;
use App\Http\Requests\HistoryRequest as UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PencapaianSiswaCrudController extends CrudController
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
            },'levelsiswa']);
        }
    }
    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $NIS=\Route::current()->parameter('NIS');
        $this->crud->setModel('App\Models\Hafalan');
        $this->crud->setRoute('siswa/history');
        $this->crud->setEntityNameStrings('Program Hafalan', 'Program Hafalan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Tanggal", // Table column heading
           
           'name' => 'tanggal',
           'type' => 'date' // the column that contains the ID of that connected entity;
           // foreign key model
        ]);
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
        $this->crud->denyAccess([ 'create', 'update', 'reorder', 'delete']);

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
        $this->crud->NIS=\Route::current()->parameter('NIS');
        
        $murojaah = \DB::table('hafalanziadah')
                    ->select('hafalanziadah.id_hafalan as idZiadah','hafalanziadah.tanggal as tglziadah', 'hafalanziadah.noJuz as juzZiadah', 'hafalanziadah.noHalamanA as hlmAZiadah', 'hafalanziadah.noHalamanB as hlmBZiadah', 'hafalanziadah.nilai as nilaiZ', 'hafalanmurojaah.id_hafalan as idMurojaah','hafalanmurojaah.tanggal as tglM', 'hafalanmurojaah.noJuz as juzM', 'hafalanmurojaah.noHalamanA as hlmAM', 'hafalanmurojaah.noHalamanB as hlmBM', 'hafalanmurojaah.nilai as nilaiM')
                    ->rightJoin('hafalanmurojaah', function ($join) {
                         $join->on('hafalanziadah.tanggal', '=', 'hafalanmurojaah.tanggal')
                              ->on('hafalanziadah.NIS', '=', 'hafalanmurojaah.NIS');
                        })
                    ->where('hafalanmurojaah.NIS', '=', auth()->user()->siswa->NIS);
        $this->crud->jenisHafalan = \DB::table('hafalanmurojaah')
                        ->select('hafalanziadah.id_hafalan as idZiadah','hafalanziadah.tanggal as tglziadah', 'hafalanziadah.noJuz as juzZiadah', 'hafalanziadah.noHalamanA as hlmAZiadah', 'hafalanziadah.noHalamanB as hlmBZiadah', 'hafalanziadah.nilai as nilaiZ', 'hafalanmurojaah.id_hafalan as idMurojaah','hafalanmurojaah.tanggal as tglM', 'hafalanmurojaah.noJuz as juzM', 'hafalanmurojaah.noHalamanA as hlmAM', 'hafalanmurojaah.noHalamanB as hlmBM', 'hafalanmurojaah.nilai as nilaiM')
                        ->rightJoin('hafalanziadah', function ($join) {
                         $join->on('hafalanziadah.tanggal', '=', 'hafalanmurojaah.tanggal')
                              ->on('hafalanziadah.NIS', '=', 'hafalanmurojaah.NIS');
                        })
                        ->where('hafalanziadah.NIS', '=', auth()->user()->siswa->NIS)
                        ->union($murojaah)
                        ->get();
        $this->crud->setListView('vendor/backpack/historySiswa');
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
