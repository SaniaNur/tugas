@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/dashboard') }}">{{ config('backpack.base.project_name') }}</a></li>
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
                    <h4>Halo {{Auth::user()->name}}  !</h4>
                    <p>Selamat Datang di Halaman {{Auth::user()->level}}</p>
                  </div>
              @if(Auth::user()->level == "Admin")   
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
                        <h3>{{$hafalan}}</h3>
                        <p>Hafalan Hari Ini</p>
                        
                      </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                          <!-- <a href="{{url('admin/pencapaian')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                      </div>

               @elseif(Auth::user()->level == "Guru")
                  <div class="row" >
                  <div class="col-md-12" >
                    <div class="col-md-3"></div>
                      <div class="col-md-3 col-xs-6"  >
              <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{$jumlahSiswa}}</h3>
                        <p>Data Siswa</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                          <!-- <a href="{{url('guru/pencapaian')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                      </div>
                    </div>


                    <div class="col-md-3 col-xs-6">
              <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{$hafalan}}</h3>
                        <p>Hafalan Hari Ini</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                          <!-- <a href="{{url('admin/siswa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                      </div>

                    </div>
                      <div class="col-md-3"></div>
                    </div>

                    <div class="col-md-12" >
                      <div class="col-md-4"></div>
                    <div class="col-md-4 col-xs-6">
              <!-- small box -->
                     <div class="small-box bg-red">
                      <div class="inner">
                          <a href="{{url('guru/hafalan/create')}}" type="button" class="btn btn-block btn-danger btn-lg">INPUT HAFALAN</a>
                      </div>
 
                      </div>
                    </div>
              @elseif( Auth::user()->level == "Siswa" )
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
                                            <canvas id="myChart" width="400" height="200"></canvas>
                                          </div>
                                        </div>
                                        <!-- /.box-body -->
                                      </div>
                                </div>
                @else           
                @endif

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
                  foreach($dataHafalan as $item){ 
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
                  foreach($dataHafalan as $item){ 
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
    $('#pilihTahun').change(function(){
      
      var url= "/tugas/public/siswa/dashboard/tahun="+$(this).val();
      console.log(url);
        window.location = url;
    });
  </script>
@endsection