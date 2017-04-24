@extends('backpack::layout')
@section('before_styles')

        <!-- include select2 css-->
        <link href="{{ asset('vendor/backpack/select2/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/backpack/select2/select2-bootstrap-dick.css') }}" rel="stylesheet" type="text/css" />

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
<div id="page-wrapper" >
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
                                    <form role="form"style="padding-left:10px; margin-top:10px">
                                        
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <select class="form-control select2" style="width:100%">
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
                                                <select class="form-control">
                                                    <option>Ziadah</option>
                                                    <option>Murojaah</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Surah Awal</label>
                                                <select class="form-control select2" style="width:100%">
                                                    @foreach($crud->dataSurah as $data)

                                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Dari Ayat</label>
                                                <input class="form-control" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Surah Akhir</label>
                                                <select class="form-control select2" style="width:100%">
                                                    @foreach($crud->dataSurah as $data)

                                                  <option value="{{$data->id}}">{{$data->nama}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Sampai Ayat</label>
                                                <input class="form-control" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="submit" class="btn btn-primary">Batal</button>
                                        
                                    </form>
                </div>

                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                <script src="{{ asset('/vendor/backpack/select2/select2.js') }}"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                      $(".select2").select2();
                    });
                </script>
@endsection