
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
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                
                                <li class="active"><a href="#grafik" data-toggle="tab">Grafik</a>
                                </li>
                                <li class=""><a href="#tabel" data-toggle="tab">Tabel</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">


                              <div class="tab-pane fade active in" id="grafik">
                                    <h4>Grafik</h4>
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Bar Chart</h3>

                                          <!-- <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                          </div> -->
                                        </div>
                                        @php
                                            $tahun=\Route::current()->parameter('tahun');
                                        @endphp
                                       
                                        <label class="col-md-2 col-sm-2 control-label">Tahun</label>
                                        <div class="col-md-2 col-sm-2">
                                          <select required class="form-control" name="tahunLaporan" id="pilihTahun">
                                          <option disable="disabled" selected="selected" value="0">---Pilih Tahun---</option>
                                          <?php
                                             $thn_skr = date('Y');
                                            for($x=$thn_skr; $x >= 2016; $x--){
                                              ?>
                                                <option @if($tahun == $x) {{'selected'}} @endif value="<?php echo $x ?>" url="/tahun={{$tahun}}"><?php echo $x?></option>
                                            <?php
                                            }
                                            ?>   
                                          </select>
                                        </div>
                                        <div class="box-body">
                                          <div class="chart">
                                            <!-- <canvas id="barChart" style="height:230px"></canvas> -->
                                             <canvas id="myChart" width="400" height="100"></canvas>
                                          </div>
                                        </div>
                                        <!-- /.box-body -->
                                      </div>
                                </div>


                                <div class="tab-pane fade" id="tabel">
                                    <h4>Tabel</h4>
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
                                                            <th rowspan="2" style="vertical-align:top">Aksi</th>
                                                            <th colspan="4" style="text-align:center;">Murojaah</th>
                                                            <th rowspan="2" style="vertical-align:top">Aksi</th>
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
                                                            <a href="{{url('admin/pencapaian/'.$crud->NIS.'/history/'.$data->idZiadah.'/edit')}}" class="btn btn-default" style="padding:2px; font-size:12px"><i class="fa fa-edit "></i> Edit</a>
                                                            <!-- <a href="{{url('admin/pencapaian/'.$crud->NIS.'/history/'.$data->idZiadah)}}" data-button-type="delete" class="btn btn-default" style="padding:2px; font-size:12px"><i class="fa fa-pencil"></i> Delete</a>                                                            </td> -->
                                                            <!-- <a href="{{ url($crud->route.'/'.$data->idZiadah) }}" class="btn btn-xs btn-default" onclick="return confirm('anda yakin?')" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a> -->
                                                        <td>@if($data->juzM)
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
                                                        <td>
                                                            <a href="{{url('admin/pencapaian/'.$crud->NIS.'/history/'.$data->idMurojaah.'/edit')}}" class="btn btn-default" style="padding:2px; font-size:12px"><i class="fa fa-edit "></i> Edit</a>
                                                            <!-- <a href="{{url('admin/pencapaian/'.$crud->NIS.'/history/'.$data->idMurojaah)}}" class="btn btn-default" onclick="return confirm('anda yakin?')" style="padding:2px; font-size:12px"><i class="fa fa-pencil"></i> Delete</a> -->
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   
                  </div>
                  </div>
                    
                      
                    </div>
                     <script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
@endsection

@section('after_scripts')              

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script>
  var months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
  var month = months[new Date().getMonth()];
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels : ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
          datasets: [{
              label: 'Jumlah Hafalan ',
            data: [ 
                @php
                  foreach($crud->dataHafalan as $item){ 
                @endphp
                {{$item['jmlHafalan']}},
            
              <?php } ?>
            ],
              backgroundColor: [
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
                  'rgba(70, 255, 55, 0.3)',
              ],
              borderColor: [
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
                'rgba(70, 255, 55, 1)',
              ],
              borderWidth: 1,
              fill: false,
              pointBackgroundColor:  'rgba(70, 255, 55, 1)',
              pointBorderColor: 'rgba(70, 255, 55, 1)',
          }]
        },
      options: {
          responsive: true,
          title:{
              display:true,
              @if($tahun)
                text:'Hafalan Tahun {{$tahun}}',
              @else
                text:'Hafalan Tahun Ini',
              @endif
              fontSize: 20
          },
          tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                  label: function(tooltipItems, data) { 
                   var juz = Math.floor(tooltipItems.yLabel);
                      var lembar =((tooltipItems.yLabel*20) % 20)/2;
                      // Convert the array to a string and format the output
                      //value = value.join('.');
                      return juz + ' juz '+lembar+' lembar';
                  }
              }
          },
          hover: {
              mode: 'nearest',
              intersect: true
          },
          scales: {
              xAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Bulan'
                  }
              }],
              yAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Juz',
                  },
                  ticks:{
                      suggestedMax: 1,
                      stepSize: 0.1 
                    }
              }],
          },
      }
  });
  </script>
  


  <script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
    $(function () {
      $('#dataTables-example').DataTable({
        "pageLength": 25,
            /* Disable initial sort */
            "aaSorting": [],
            "language": {
                "emptyTable":     "Tidak ada data dalam tabel ini",
                "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
                "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered":   "(filtered from MAX total entries)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Tampilkan_MENU_ Data Tiap Halaman",
                "loadingRecords": "Loading...",
                "processing":     "Proses mengambil data...",
                "search":         "Cari: ",
                "zeroRecords":    "No matching records found",
                "paginate": {
                    "first":      "Pertama",
                    "last":       "Terakhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"
                },
                "aria": {
                    "sortAscending":  ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
              }
      });
    });

    $('#pilihTahun').change(function(){
      var url = "{{ url ('/')}}/{{$crud->getRoute()}}/tahun="+$(this).val();
      console.log(url);
        window.location = url;
    });
</script>
            
@endsection