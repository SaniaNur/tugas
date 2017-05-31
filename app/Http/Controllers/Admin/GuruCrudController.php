<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\GuruRequest as StoreRequest;
use App\Http\Requests\GuruRequest as UpdateRequest;
use App\User;
use App\Models\GuruUpdate as Guru;

class GuruCrudController extends CrudController
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
        $this->crud->setModel('App\Models\GuruUpdate');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/guru');
        $this->crud->setEntityNameStrings('Data Guru', 'Data Guru');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([ // Text
                'name' => 'no_guru',
                'label' => "No. Guru",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'id_user',
                'label' => "ID",
                'type' => 'hidden',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'nama',
                'label' => "Nama",
                'type' => 'text',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // select_from_array
                'name' => 'jenisKelamin',
                'label' => "Jenis Kelamin",
                'type' => 'select_from_array',
                'options' => ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'],
                'allows_null' => false,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'alamat',
                'label' => "Alamat",
                'type' => 'textarea',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([   // Number
                'name' => 'noHp',
                'label' => 'Handphone',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "$",
                // 'suffix' => ".00",
            ], 'both');
        $this->crud->addField([   // Password
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password'
        ], 'both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
           'name' => 'no_guru', // The db column name
           'label' => "No. Guru" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'nama', // The db column name
           'label' => "Nama" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'jenisKelamin', // The db column name
           'label' => "Jenis Kelamin" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'alamat', // The db column name
           'label' => "Alamat" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'noHp', // The db column name
           'label' => "Handphone" // Table column heading
        ]); // add a single column, at the end of the stack
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
    }

    public function store(StoreRequest $request)
    {
        $user= new User;
        $user->name=$request->nama;
        $user->password=$request->password;
        $user->username=$request->no_guru;
        $user->level='guru';
        $user->save();
        $guru=new Guru;
        $guru->no_guru=$request->no_guru;
        $guru->id_user=$user->id;
        $guru->nama=$request->nama;
        $guru->jenisKelamin=$request->jenisKelamin;
        $guru->alamat=$request->alamat;
        $guru->noHp=$request->noHp;
        $guru->save();
        return \Redirect::to ('admin/guru');
        // your additional operations before save here
        // $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        // return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        // $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        // return $redirect_location;
        $guru=[
        'no_guru'=>$request->no_guru,
        'id_user'=>$request->id_user,
        'nama'=>$request->nama,
        'jenisKelamin'=>$request->jenisKelamin,
        'alamat'=>$request->alamat,
        'noHp'=>$request->noHp,
        ];
        Guru::where('id_user','=',$request->id_user)->update($guru);
        if(!empty($request->password)){
         $user=[
        'username'=>$request->no_guru,
        'password'=>bcrypt($request->password)
        ];   
    }else{
        $user=[
        'username'=>$request->no_guru,
        ];
    }
        
        User::where('id','=',$request->id_user)->update($user);
        return \Redirect::to ('admin/guru');
    }
}
