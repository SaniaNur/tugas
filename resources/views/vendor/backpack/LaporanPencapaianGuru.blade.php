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

    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
      <div class="box">
        
                <!-- <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link">Tabel</a></li>
                    <li><a class="nav-link">Grafik</a></li>
                </ul> -->
              
        <div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">

          @include('crud::inc.button_stack', ['stack' => 'top'])

          <div id="datatable_button_stack" class="pull-right text-right"></div>
        </div>

        <div class="box-body ">
            

       
            <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    
                <div class="col-md-6 col-sm-6" style="width:100%">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan
                        </div>
                        <!-- <div class="panel-body">
                            <ul class="nav nav-tabs">
                                
                                <li class="active"><a href="#grafik" data-toggle="tab">Grafik</a>
                                </li>
                                <li class=""><a href="#tabel" data-toggle="tab">Tabel</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade" id="tabel"> -->
                                    <h4 style="padding-left:10px">Tabel</h4>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <center>
                                                        <tr>
                                                            <th style="vertical-align:top">No</th>
                                                            <th style="vertical-align:top">Pendapatan 1 Bulan</th>
                                                            <th style="text-align:center;">Total Pendapatan</th>
                                                            
                                                            
                                                            
                                                        </tr>
                                                       
                                                    </center>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i=1;
                                                        @endphp
                                                        
                                                          <tr>
                                                        <td>{{$i}}</td>
                                                        <td>a</td>
                                                        <td>a</td>
                                                        </tr>
                                                    </tbody>
                                                   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                


                               <!--  </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                   
                  </div>
                  </div>
                    
                      
  </div>
@endsection