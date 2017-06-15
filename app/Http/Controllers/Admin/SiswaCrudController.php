<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\SiswaRequest as StoreRequest;
use App\Http\Requests\SiswaRequest as UpdateRequest;
use App\User;
use App\Models\SiswaUpdate as Siswa;

class SiswaCrudController extends CrudController
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
        $this->crud->setModel('App\Models\SiswaUpdate');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/siswa');
        $this->crud->setEntityNameStrings('Data Siswa', 'Data Siswa');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([ // Text
                'name' => 'NIS',
                'label' => "NIS",
                'type' => 'number',
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
            ], 'update');
        // $this->crud->addField([  // Select2
        //    'label' => "No Guru",
        //    'type' => 'select2',
        //    'name' => 'category_id', // the db column for the foreign key
        //    'entity' => 'category', // the method that defines the relationship in your Model
        //    'attribute' => 'name', // foreign key attribute that is shown to user
        //    'model' => "App\Models\Tag" // foreign key model
        // ], 'both');
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
        $this->crud->addField([ // select_from_array
                'name' => 'kelas',
                'label' => "Kelas",
                'type' => 'select_from_array',
                'options' => ['X' => 'Kelas X', 'XI IPA 1' => 'Kelas XI IPA 1', 'XI IPA 2' => 'Kelas XI IPA 2'],
                'allows_null' => false,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ], 'both');
        $this->crud->addField([
               // 1-n relationship
               'label' => "Guru Pembimbing", // Table column heading
               'type' => "select2",
               'name' => 'no_guru', // the column that contains the ID of that connected entity;
               'entity' => 'guru', // the method that defines the relationship in your Model
               'attribute' => "nama", // foreign key attribute that is shown to user
               'model' => "App\Models\Guru", // foreign key model
            ], 'both');
       
        $this->crud->addField([ // Text
                'name' => 'alamat',
                'label' => "Alamat",
                'type' => 'textarea',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
         $this->crud->addField([ // Text
                'name' => 'namaIbu',
                'label' => "Nama Ibu",
                'type' => 'text',
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
           'name' => 'NIS', // The db column name
           'label' => "NIS" // Table column heading
        ]);
        //  $this->crud->addColumn([
        //    'name' => 'no_guru', // The db column name
        //    'label' => "No. Guru" // Table column heading
        // ]);
        $this->crud->addColumn([
           'name' => 'nama', // The db column name
           'label' => "Nama" // Table column heading
        ]);
         $this->crud->addColumn([
           'name' => 'jenisKelamin', // The db column name
           'label' => "Jenis Kelamin" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'kelas', // The db column name
           'label' => "Kelas" // Table column heading
        ]);
        // $this->crud->addColumn([
        //        // 1-n relationship
        //        'label' => "Guru Pembimbing", // Table column heading
        //        'type' => "select",
        //        'name' => 'no_guru', // the column that contains the ID of that connected entity;
        //        'entity' => 'guru', // the method that defines the relationship in your Model
        //        'attribute' => "nama", // foreign key attribute that is shown to user
        //        'model' => "App\Models\Guru", // foreign key model
        //     ]);
        $this->crud->addColumn([
           'name' => 'alamat', // The db column name
           'label' => "Alamat" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'namaIbu', // The db column name
           'label' => "Nama Ibu" // Table column heading
        ]);
        $this->crud->addColumn([
           'name' => 'noHp', // The db column name
           'label' => "Handphone" // Table column heading
        ]);
        
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
        $this->crud->enableExportButtons();

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
        // your additional operations before save here
        $user= new User;
        $user->name=$request->nama;
        $user->password=$request->password;
        $user->username=$request->NIS;
        $user->level='siswa';
        $user->save();
        $siswa=new Siswa;
        $siswa->NIS=$request->NIS;
        $siswa->id_user=$user->id;
        $siswa->no_guru=$request->no_guru;
        $siswa->nama=$request->nama;
        $siswa->jenisKelamin=$request->jenisKelamin;
        $siswa->kelas=$request->kelas;
        $siswa->alamat=$request->alamat;
        $siswa->noHp=$request->noHp;
        $siswa->namaIbu=$request->namaIbu;
        $siswa->save();
        return \Redirect::to ('admin/siswa');
        


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
        $siswa=[
        'NIS'=>$request->NIS,
        'id_user'=>$request->id_user,
        'no_guru'=>$request->no_guru,
        'nama'=>$request->nama,
        'jenisKelamin'=>$request->jenisKelamin,
        'kelas'=>$request->kelas,
        'alamat'=>$request->alamat,
        'noHp'=>$request->noHp,
        'namaIbu'=>$request->namaIbu,
        ];
        // dd($siswa);
        Siswa::where('id_user','=',$request->id_user)->update($siswa);
        if(!empty($request->password)){
         $user=[
         'name'=>$request->nama,
        'username'=>$request->NIS,
        'password'=>bcrypt($request->password)
        ];   
    }else{
        $user=[
        'name'=>$request->nama,
        'username'=>$request->NIS,
        ];
    }
        
        User::where('id','=',$request->id_user)->update($user);
        return \Redirect::to ('admin/siswa');

    }

    public function destroy($id){
        $siswa=Siswa::where('id_user',$id);
        $siswa->delete();
        $user=User::find($id);
        $user->delete();
    }


}
