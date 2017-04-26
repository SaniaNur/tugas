@extends('backpack::layout')
@section('before_styles')

        <!-- include select2 css-->
        <link href="{{ asset('vendor/backpack/select2/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/backpack/select2/select2-bootstrap-dick.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/adminlte/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}" rel="stylesheet" type="text/css" />
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
<div id="page-wrapper" style="width:65%; margin:auto">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Input Hafalan</h2>
                    </div>
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                             Hafalan Siswa
                        </div>
                                    <form role="form"style="padding-left:10px; margin-top:10px; padding-right:10px" action={{url('/hafalan/tambah')}} method='post' >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="input-group date" data-provide="datepicker">
                                                    <input type="text" class="form-control" id="datepicker" name="tanggal" >
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <select name="NIS" class="form-control select2" style="width:100%">
                                                    @foreach($crud->dataSiswa as $data)

                                                  <option value="{{$data->NIS}}">{{$data->nama}}</option>
                                                   @endforeach
                                                </select>
                                                <!-- <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span> -->
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Jenis</label>
                                                <select name="jenis" class="form-control">
                                                    <option value="ziadah">Ziadah</option>
                                                    <option value="murojaah">Murojaah</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Awal :</label>
                                                
                                            </div>
                                            <div style="padding-left:30px">
                                            <div class="form-group">
                                                <label>Surah</label>
                                                <select name="surahAwal" class="form-control select2" style="width:100%">
                                                    @foreach($crud->dataSurah as $data)

                                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Dari Ayat</label>
                                                <input name="ayatAwal" class="form-control" />
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Akhir :</label>
                                                
                                            </div>
                                            <div style="padding-left:30px">
                                            <div class="form-group">
                                                <label>Surah</label>
                                                <select name="surahAkhir" class="form-control select2" style="width:100%">
                                                    @foreach($crud->dataSurah as $data)

                                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label>Sampai Ayat</label>
                                                <input name="ayatAkhir" class="form-control" />
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                            <a href="{{url('/admin/hafalan')}}" class="btn btn-primary">Batal</a>
                                        
                                    </form>
                </div>

                </div>

                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                <script src="{{ asset('/vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
                <script src="{{ asset('/vendor/backpack/select2/select2.js') }}"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                      $("#select2").select2();
                    });
                    $('#datepicker').datepicker({
                        format: 'dd/MM/yyyy',
                        endDate: '0d', 
                        todayBtn: "linked",
                        autoClose: true
                    });
                    
                </script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {

                      PNotify.prototype.options.styling = "bootstrap3";
                      PNotify.prototype.options.styling = "fontawesome";

                      // @foreach (Alert::getMessages() as $type => $messages)
                      //     // @foreach ($messages as $message)
                      //         @if($type == "error")
                      //             $(function(){
                      //           new PNotify({
                      //             title: 'Error',
                      //             text: "{{ $message }}",
                      //             type: "{{ $type }}",
                      //           });
                      //         });
                      //         @endif
                      //         @if($type == "success")
                      //             $(function(){
                      //           new PNotify({
                      //             title: 'Sukses',
                      //             text: "{{ $message }}",
                      //             type: "{{ $type }}",
                      //           });
                      //         });  
                      //         @endif
                      //     // @endforeach
                      // @endforeach
                    });
                  </script>

@endsection