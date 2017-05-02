@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div id="page-wrapper" >
            <div id="page-inner">
                <!-- <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>     
                    </div>
                </div>   -->            
                 <!-- /. ROW  -->
                  <hr />
                  <div class="callout callout-success">
                    <h4>Halo Admin  !</h4>
                    <p>Selamat Datang di Halaman Super Admin.</p>
                  </div>
                  
                <div class="row" >
                  <div class="col-md-12" >
                    <div class="col-md-3"></div>
                  <div class="col-md-3 col-xs-6"  >
              <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{$jumlahGuru}}</h3>
                        <p>Data Guru</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                          <a href="{{url('admin/guru')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
              <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{$jumlahSiswa}}</h3>
                        <p>Data Siswa</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                          <a href="{{url('admin/siswa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>

                    </div>
                      <div class="col-md-3"></div>
                    </div>

                    <div class="col-md-12" >
                      <div class="col-md-4"></div>
                    <div class="col-md-4 col-xs-6">
              <!-- small box -->
                    <div class="small-box bg-red" style="text-align:center">
                      <div class="inner">
                        <h3>3</h3>
                        <p>Jumlah Hafalan Hari Ini</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                          <a href="{{url('admin/siswa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6"> 
                    <div class="panel panel-back noti-box text-center" >
                    <i class="fa fa-users" style="font-size:50px" ></i>
                    <div class="text-box" >
                      <h3>Data Guru</h3>
                      <h2>{{$jumlahGuru}}</h2>
                    </div>
                    </div>
                  </div> -->
                 <!--  <div class="col-md-6 col-sm-6 col-xs-6">           
                    <div class="panel panel-back noti-box text-center">
                      <i class="fa fa-users" style="font-size:50px"></i>
                      <div class="text-box" >
                        <h3>Data Siswa</h3>
                        <h2>{{$jumlahSiswa}}</h2>
                      </div>
                    </div>
                  </div> -->
                   
                </div>
            </div>
                    
                      
        </div>
@endsection
