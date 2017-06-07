
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
<!-- Default box -->
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
                            History Hafalan
                        </div>
                        

                            <!-- <div class="tab-content">

                                <div class="tab-pane fade" id="tabel"> --> 
                                    <h4 style="padding-left:10px">Tabel</h4>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <center>
                                                        <tr>
                                                            <th rowspan="2" style="vertical-align:top">No</th>
                                                            <th rowspan="2" style="vertical-align:top">Tanggal</th>
                                                            <th colspan="4" style="text-align:center;">Ziadah</th>
                                                            
                                                            <th colspan="4" style="text-align:center;">Murojaah</th>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th>Juz</th>

                                                            <th>Dari</th>
                                                            <th>Sampai</th>
                                                            <th>Nilai</th>
                                                            <th>Juz</th>

                                                            <th>Dari</th>
                                                            <th>Sampai</th>
                                                            <th>Nilai</th>
                                                            
                                                        </tr>
                                                    </center>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i=1;
                                                        @endphp
                                                        @foreach($crud->jenisHafalan as $data)
                                                          <tr>
                                                        <td>{{$i}}</td>
                                                        @if($data->tglziadah!=null)

                                                        <td>{{\Carbon\Carbon::parse($data->tglziadah)->format('d M Y')}}</td>
                                                        @else
                                                        <td>{{\Carbon\Carbon::parse($data->tglM)->format('d M Y')}}</td>
                                                        @endif
                                                        <td>@if($data->juzZiadah)
                                                          {{$data->juzZiadah}} 
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->hlmAZiadah)
                                                          {{$data->hlmAZiadah}}
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->hlmBZiadah)
                                                          {{$data->hlmBZiadah}}
                                                           @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->nilaiZ)
                                                          {{$data->nilaiZ}}
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        
                                                        <td>
                                                            @if($data->juzM)
                                                          {{$data->juzM}} 
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->hlmAM)
                                                          {{$data->hlmAM}}
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->hlmBM)
                                                          {{$data->hlmBM}}
                                                           @else
                                                          -
                                                          @endif
                                                        </td>
                                                        <td>@if($data->nilaiM)
                                                          {{$data->nilaiM}}
                                                          @else
                                                          -
                                                          @endif
                                                        </td>
                                                        
                                                          </tr>
                                                          @php
                                                          $i++
                                                          @endphp
                                                        @endforeach
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

                    <script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>                  
@endsection

                    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
                    <!-- //<script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>-->
                    @section('after_scripts')
                    <script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                    <script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

                    <script>
                      $(function () {
                        
                        $('#dataTables-example').DataTable({
                          
                        });
                      });
                      </script>
                                              


                @endsection
             <!-- /. PAGE INNER  -->
    
                    
                      
                    
             <!-- /. PAGE INNER  -->          

                 <!-- /. ROW  -->           