<?php

namespace App\Http\Controllers\Guru;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\HistoryRequest as StoreRequest;
use App\Http\Requests\HistoryRequest as UpdateRequest;
use App\Models\Hafalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryGuruCrudController extends CrudController
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
        $NIS=\Route::current()->parameter('NIS');
        $this->crud->setModel('App\Models\Hafalan');
        $this->crud->setRoute('guru/hafalan');
        $this->crud->setEntityNameStrings('Pencapaian Hafalan', 'Pencapaian Hafalan');

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
       $this->crud->addField([   // date_picker
               'name' => 'tanggal',
               'type' => 'date_picker',
               'label' => 'Tanggal',
               // optional:
               'date_picker_options' => [
                'todayHighlight'=>true,
                  'todayBtn' => 'linked',
                  'format' => 'dd mm yyyy',
                  // 'language' => 'id',
                  'autoclose'=>true
               ],
            ], 'both');
        
        
        
        $this->crud->addField([ // Text
                'name' => 'noJuz',
                'label' => "Juz",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'noHalamanA',
                'label' => "Dari Halaman",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'noHalamanB',
                'label' => "Sampai Halaman",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');

         $this->crud->addField([ // Text
                'name' => 'nilai',
                'label' => "Nilai",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
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
        $this->crud->denyAccess([ 'create', 'reorder']);

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
        // $this->crud->enableExportButtons();
        
        $this->crud->NIS=\Route::current()->parameter('NIS');
        
        $murojaah = \DB::table('hafalanziadah')
                    ->select('hafalanziadah.id_hafalan as idZiadah','hafalanziadah.tanggal as tglziadah', 'hafalanziadah.noJuz as juzZiadah', 'hafalanziadah.noHalamanA as hlmAZiadah', 'hafalanziadah.noHalamanB as hlmBZiadah', 'hafalanziadah.nilai as nilaiZ', 'hafalanmurojaah.id_hafalan as idMurojaah','hafalanmurojaah.tanggal as tglM', 'hafalanmurojaah.noJuz as juzM', 'hafalanmurojaah.noHalamanA as hlmAM', 'hafalanmurojaah.noHalamanB as hlmBM', 'hafalanmurojaah.nilai as nilaiM')
                    ->rightJoin('hafalanmurojaah', function ($join) {
                         $join->on('hafalanziadah.tanggal', '=', 'hafalanmurojaah.tanggal')
                              ->on('hafalanziadah.NIS', '=', 'hafalanmurojaah.NIS');
                        })
                    ->where('hafalanmurojaah.NIS', '=', $NIS);
        $this->crud->jenisHafalan = \DB::table('hafalanmurojaah')
                        ->select('hafalanziadah.id_hafalan as idZiadah','hafalanziadah.tanggal as tglziadah', 'hafalanziadah.noJuz as juzZiadah', 'hafalanziadah.noHalamanA as hlmAZiadah', 'hafalanziadah.noHalamanB as hlmBZiadah', 'hafalanziadah.nilai as nilaiZ', 'hafalanmurojaah.id_hafalan as idMurojaah','hafalanmurojaah.tanggal as tglM', 'hafalanmurojaah.noJuz as juzM', 'hafalanmurojaah.noHalamanA as hlmAM', 'hafalanmurojaah.noHalamanB as hlmBM', 'hafalanmurojaah.nilai as nilaiM')
                        ->rightJoin('hafalanziadah', function ($join) {
                         $join->on('hafalanziadah.tanggal', '=', 'hafalanmurojaah.tanggal')
                              ->on('hafalanziadah.NIS', '=', 'hafalanmurojaah.NIS');
                        })
                        ->where('hafalanziadah.NIS', '=', $NIS)
                        ->union($murojaah)
                        ->get();
        $this->crud->setListView('vendor/backpack/historyHafalanGuru');

        // $NIS = \Route::current()-> parameter('NIS');
        // $id_hafalan=Hafalan::select('id')->where ([['NIS','=',$NIS],['jenis','=','ziadah']])->get();
        // foreach ($id_hafalan as $id) {
        //     $awalZiadah=DetailHafalan::where ([['id_hafalan','=',$id],['jenisAyat','=','awal']])->first();
        //     $akhirZiadah=DetailHafalan::where ([['id_hafalan','=',$id],['jenisAyat','=','akhir']])->first();
        //     $ziadah=(["awal"=>[$awalZiadah->surah, $awalZiadah->ayat],["akhir"->[$akhirZiadah->surah, $akhirZiadah->ayat]

        //         ])
        // }
    }
    
    
    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');
        $id=\Route::current()->parameter('id');
        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
    }
     public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        $id=\Route::current()->parameter('id');

        return $this->crud->delete($id);
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
 //
}
