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
                        <h3>3</h3>
                        <p>Jumlah Hafalan Hari Ini</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                          <a href="{{url('admin/siswa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>

               @elseif(Auth::user()->level == "Guru")
                  <div class="row" >
                  <div class="col-md-12" >
                    <div class="col-md-3"></div>
                      <div class="col-md-3 col-xs-6"  >
              <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>YUK!<h3>
                        <p>Input Hafalan</p>
                      </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                          <a href="{{url('guru/hafalan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                          <a href="{{url('guru/pencapaian')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                          <a href="{{url('guru/siswa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                                        <div class="box-body">
                                          <div class="chart">
                                            <canvas id="barChart" style="height:230px"></canvas>
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

        <script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
                    <script src="{{ asset('vendor/adminlte/plugins/chartjs/Chart.min.js') }}"></script>

                    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    //var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    //var areaChart = new Chart(areaChartCanvas);
    
    
    var areaChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    };

   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
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
@endsection
