
@extends('backpack::layout')
@section('before_styles')
<link href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header')
    <section class="content-header">
      <h1>
        <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
        <small>{{ trans('backpack::crud.all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span> {{ trans('backpack::crud.in_the_database') }}.</small>
      </h1> 
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
        <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
        <li class="active">{{ trans('backpack::crud.list') }}</li>
      </ol>
    </section>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <!-- Default box -->
    
    
      <form method="POST" action="{{url('guru/hafalan')}}" accept-charset="UTF-8"><input name="_token" type="hidden" value="rAGK149kuzTGU3yzoKL8wnUVj7jmtr60rnYJtPe7">
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Add a new  Input Hafalan</h3>
        </div>
        <div class="box-body row">
          <!-- load the view from the application if it exists, otherwise load the one in the package -->
                      <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- bootstrap datepicker input -->


<div class="form-group col-md-12"
 >
    <input type="hidden" name="tanggal" value="">
    <label>Tanggal</label>
        <div class="input-group date">
        <input
            data-bs-datepicker="{&quot;todayHighlight&quot;:true,&quot;todayBtn&quot;:&quot;linked&quot;,&quot;format&quot;:&quot;dd MM yyyy&quot;,&quot;language&quot;:&quot;id&quot;,&quot;autoclose&quot;:true}"
            type="text"
            class="form-control"
              >
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>

    
    </div>





    
    
    
    

        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- select2 -->
<div class="form-group col-md-12"
 >
    <label>Nama Siswa</label>
            <select
        name="NIS"
        class="form-control select2"
          >

        
                                                <option value="3333"
                                            >aaaa</option>
                                    <option value="3334"
                                            >nana</option>
                                </select>

    
    </div>





    
    
    
    

        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- select2 from array -->
<div class="form-group col-md-12"
 >
    <label>Jenis Hafalan</label>
    <select
        name="jenis"
        class="form-control select2"
                  >

        
                                                <option value="ziadah"
                                            >Ziadah</option>
                                    <option value="murojaah"
                                            >Murojaah</option>
                                </select>

    
    </div>





    
    
    
    


        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- text input -->
<div class="form-group col-md-12"
 >
    <label>Juz</label>
    
                    <input
            type="text"
            name="noJuz"
            value=""
            class="form-control"
          >
            
    
    </div>





    





    


        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- text input -->
<div class="form-group col-md-12"
 >
    <label>Dari Halaman</label>
    
                    <input
            type="text"
            name="noHalamanA"
            value=""
            class="form-control"
          >
            
    
    </div>





    





    


        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- text input -->
<div class="form-group col-md-12"
 >
    <label>Sampai Halaman</label>
    
                    <input
            type="text"
            name="noHalamanB"
            value=""
            class="form-control"
          >
            
    
    </div>





    





    


        <!-- load the view from the application if it exists, otherwise load the one in the package -->
            <!-- text input -->
<div class="form-group col-md-12"
 >
    <label>Nilai</label>
    
                    <input
            type="text"
            name="nilai"
            value=""
            class="form-control"
          >
            
    
    </div>





    





    


    



                  </div><!-- /.box-body -->
        <div class="box-footer">

                <div id="saveActions" class="form-group">

    <input type="hidden" name="save_action" value="save_and_back">

    <div class="btn-group">

        <button type="submit" class="btn btn-success">
            <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
            <span data-value="save_and_back">Save and back</span>
        </button>

        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Save Dropdown</span>
        </button>

        <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);" data-value="save_and_edit">Save and edit this item</a></li>
                        <li><a href="javascript:void(0);" data-value="save_and_new">Save and new item</a></li>
                    </ul>

    </div>

    <a href="{{url('guru/hafalan')}}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
</div>
        </div><!-- /.box-footer-->

      </div><!-- /.box -->
      </form>
  </div>
</div>

@endsection
             