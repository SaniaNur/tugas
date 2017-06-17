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
<script src="http://localhost/tugas/public/vendor/adminlte/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js" type="text/javascript"></script>
    
    <script src="http://localhost/tugas/public/vendor/adminlte/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script>
    {{-- $(function () {
      $('#dataTables-example').DataTable({
      });
    }); --}}
    $('#btncari').click(function(){
      var url = "/tugas/public/{{$crud->getRoute()}}/"+$('#pilihBulan').val()+"/"+$('#pilihTahun').val();
      console.log(url);
        window.location = url;
    });
    
  </script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var dtButtons = function(buttons){
            var extended = [];
            for(var i = 0; i < buttons.length; i++){
                var item = {
                    extend: buttons[i],
                    exportOptions: {
                        columns: [':visible']
                    }
                };
                switch(buttons[i]){
                    case 'pdfHtml5':
                    item.orientation = 'portrait';
                    break;
                }
                extended.push(item);
            }
            return extended;
        }
      
        var table = $("#dataTables-example").DataTable({
            "pageLength": 25,
            /* Disable initial sort */
            "aaSorting": [],
            "language": {
                "emptyTable":     "Tidak ada data dalam tabel ini",
                "info":           "",
                "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered":   "(filtered from MAX total entries)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "",
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
            },
          
             // show the export datatable buttons
            dom: '<"p-l-0 col-md-6"l>B<"p-r-0 col-md-6"f>rt<"col-md-6 p-l-0"i><"col-md-6 p-r-0"p>',
            buttons: dtButtons([
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print',
                'colvis'
            ]),
        });

        // move the datatable buttons in the top-right corner and make them smaller
        table.buttons().each(function(button) {
            if (button.node.className.indexOf('buttons-columnVisibility') == -1)
            {
                button.node.className = button.node.className + " btn-sm";
            }
        });
        $(".dt-buttons").appendTo($('#datatable_button_stack' ));
    });
</script>
@endsection