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
                            Laporan Pencapaian
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
                                                <!-- <label class="col-md-2 col-sm-2 control-label ">Bulan</label>
                                                        <div class="col-md-2 col-sm-2 ">
                                                            <select required class="form-control">
                                                                <option value="00">---Pilih Bulan---</option>
                                                                <option value="01">Januari</option>
                                                                <option value="02">Februari</option>
                                                                <option value="03">Maret</option>
                                                                <option value="04">April</option>
                                                                <option value="05">Mei</option>
                                                                <option value="06">Juni</option>
                                                                <option value="07">Juli</option>
                                                                <option value="08">Agustus</option>
                                                                <option value="09">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                        </div> -->

                                                <label class="col-md-2 col-sm-2 control-label ">Bulan</label>
                                                    <div class="col-md-2 col-sm-2 ">
                                                        <select id="pilihBulan" required class="form-control" name="bulan">
                                                            <option disabled="disabled" selected="selected" value="0">--pilih bulan--</option>
                                                        <?php
                                                        $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                        for($bulan=1; $bulan<=12; $bulan++){
                                                        if($bulan<=9) { echo "<option value='0$bulan'>$bln[$bulan]</option>"; }
                                                        else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                <label class="col-md-2 col-sm-2 control-label">Tahun</label>
                                                    <div class="col-md-2 col-sm-2">
                                                        <select id="pilihTahun" required class="form-control" name="tahun">
                                                            <option disabled="disabled" selected="selected" value="0">---Pilih Tahun---</option>
                                                            <?php
                                                                $thn_skr = date('Y');
                                                                for($x=$thn_skr; $x>=2016; $x--){
                                                                ?>
                                                                    <option value="<?php echo $x?>"><?php echo $x ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <button id="btncari" class="btn btn-default">cari</button>
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <center>
                                                        <tr>
                                                            <th style="vertical-align:top">No</th>
                                                            <th style="vertical-align:top">Nama</th>
                                                            <th style="vertical-align:top">Pendapatan 1 Bulan</th>
                                                            <th style="text-align:center;">Total Pendapatan</th>
                                                            
                                                            
                                                            
                                                        </tr>
                                                       
                                                    </center>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i=1;
                                                          foreach($crud->dataHafalan as $item){
                                                          $floor=floor($item['jmlHafalan']);
                                                          $lembar=((($item['jmlHafalan']*20) % 20)/2);
                                                          @endphp
                                                          <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$item['nama']}}</td>
                                                            @if($floor==0)
                                                            <td>{{(($item['jmlHafalan']*20) % 20)/2}} lembar</td>
                                                            @else
                                                                @if($lembar==0)
                                                                <td>{{$floor.' juz'}}</td>
                                                                @else
                                                                <td>{{$floor.' juz - '.(($item['jmlHafalan']*20) % 20)/2}} lembar</td>
                                                                @endif
                                                            @endif
                                                            <td>a</td>
                                                        </tr>
                                                          <?php $i++; } ?>
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

@section('after_scripts')
<script>
    $('#btncari').click(function(){
      var url = "/tugas/public/{{$crud->getRoute()}}/"+$('#pilihBulan').val()+"/"+$('#pilihTahun').val();
      console.log(url);
        window.location = url;
    });
    
  </script>
@endsection