
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
                    <div class="col-md-12">
                     <h2>Program Hafalan</h2>    
                    </div>
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

                                          <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                          </div>
                                        </div>
                                        <div class="box-body">
                                          <div class="chart">
                                            <!-- <canvas id="barChart" style="height:230px"></canvas> -->
                                             <canvas id="myChart" width="400" height="200"></canvas>
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
                                                            <a href="{{ url($crud->route.'/'.$data->idZiadah) }}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a>
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
                                                            <a href="{{url('admin/pencapaian/'.$crud->NIS.'/history/'.$data->idMurojaah)}}" class="btn btn-default" style="padding:2px; font-size:12px"><i class="fa fa-pencil"></i> Delete</a>
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
              text:'Hafalan',
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
                      suggestedMax: 25,
                      stepSize: 5 
                    }
              }],
          },
      }
  });
  </script>

  <script src="{{ asset('vendor/adminlte/plugins/chartjs/Chart.min.js') }}"></script>
  <script>
    $(function () {
      var areaChartData = {
        labels : ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [
          {
            label: "Hafalan",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "rgba(60,141,188,0.8)",
            pointColor: "#3b8bba",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [ 
                @php
                  foreach($crud->dataHafalan as $item){ 
                @endphp
                {{$item['jmlHafalan']}},
                <?php } ?>
            ]
          },
        ]
      };

   
    //-------------
    //- BAR CHART -
    //-------------
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      var barChart = new Chart(barChartCanvas);
      var barChartData = areaChartData;
      barChartData.datasets[0].fillColor = "#00a65a";
      barChartData.datasets[0].strokeColor = "#00a65a";
      barChartData.datasets[0].pointColor = "#00a65a";
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      };

      barChartOptions.datasetFill = false;
      barChart.Bar(barChartData, barChartOptions);
    });
  </script>

  <script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
    $(function () {
      $('#dataTables-example').DataTable({
      });
    });
  </script>
@endsection