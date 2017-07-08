<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use App\Http\Requests\ProfilRequest as StoreRequest;
use App\Http\Requests\ProfilRequest as UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfilCrudController extends CrudController
{
     
    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        
        $this->crud->setModel('App\Models\User');
        if(auth()->user()->level == "Admin"){
            $this->crud->setRoute('admin/editProfil');    
        }elseif(auth()->user()->level == "Guru"){
            $this->crud->setRoute('guru/editProfil');
        }elseif(auth()->user()->level == "Siswa"){
            $this->crud->setRoute('siswa/editProfil');
        }
        
    
        // $this->crud->setEntityNameStrings('Program Hafalan', 'Program Hafalan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();

        // ------ CRUD FIELDS

        $this->crud->addField([ // Text
                'name' => 'a',
                'label' => "Password Lama :",
                'type' => 'password',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'ab',
                'label' => "Password Lama :",
                'type' => 'hidden',
                'value' => auth()->user()->password
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'b',
                'label' => "Password Baru",
                'type' => 'password',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        $this->crud->addField([ // Text
                'name' => 'c',
                'label' => "Ulangi Password Baru",
                'type' => 'password',
                // optional
                //'prefix' => '',
                //'suffix' => ''
            ], 'both');
        // $this->crud->addField($options, 'update/create/both');
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
        $this->crud->denyAccess([ 'list','create', 'reorder', 'delete']);

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
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $user = User::find(auth()->user()->id);
        if(\Hash::check($request->a, $user->password)){
            $user->password = \Hash::make($request->b);
            $user->save(); 
        }else{
            $request->session()->flash('eror', 'Your password has not been changed.');
        }  

        if($user){
          \Alert::success('Password Berhasil Diubah')->flash();  
        }
        else{
            \Alert::error('Data Gagal Ditambahkan')->flash();
        }
        
        if(auth()->user()->level == "Admin"){
            $pw='admin/dashboard';    
        }elseif(auth()->user()->level == "Guru"){
            $pw='guru/dashboard';
        }elseif(auth()->user()->level == "Siswa"){
            $pw='siswa/dashboard';
        }
        return redirect($pw);
    }
}
