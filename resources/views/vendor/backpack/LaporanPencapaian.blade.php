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
      <div class="box"style="padding:16px">
        
                <!-- <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link">Tabel</a></li>
                    <li><a class="nav-link">Grafik</a></li>
                </ul> -->
              
        <div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">

          @include('crud::inc.button_stack', ['stack' => 'top'])

          <div id="datatable_button_stack" class="pull-right text-right"></div>
                                                <?php 
                                                    $tahun_params=\Route::current()->parameter('tahun');
                                                    $bulan_params=\Route::current()->parameter('bulan');
                                                ?>
                                                <label class="col-md-1 col-sm-1 control-label " >Bulan</label>
                                                    <div class="col-md-2 col-sm-2 ">
                                                        <select id="pilihBulan" required class="form-control" name="bulan">
                                                            <option disabled="disabled" selected="selected" value="0">--pilih bulan--</option>
                                                        <?php
                                                        $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                        for($bulan=1; $bulan<=12; $bulan++){
                                                            if ($bulan == $bulan_params) {
                                                                echo "<option value='$bulan' selected>$bln[$bulan]</option>"; 
                                                            } else {
                                                                echo "<option value='$bulan'>$bln[$bulan]</option>"; 
                                                            }
                                                            
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                <label class="col-md-1 col-sm-1 control-label" >Tahun</label>
                                                    <div class="col-md-2 col-sm-2">
                                                        <select id="pilihTahun" required class="form-control" name="tahun">
                                                            <option disabled="disabled" selected="selected" value="0">---Pilih Tahun---</option>
                                                            <?php
                                                                $thn_skr = date('Y');
                                                                for($x=$thn_skr; $x>=2016; $x--){
                                                                ?>
                                                                @if($x == $tahun_params)
                                                                    <option selected value="<?php echo $x?>"><?php echo $x ?></option>
                                                                @else 
                                                                    <option value="<?php echo $x?>"><?php echo $x ?></option>
                                                                @endif
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <button id="btncari" class="btn btn-default">cari</button>
        </div>

        <div class="box-body table-responsive">
            

       
            
                                            <div class="table-responsive">
                                            
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <center>
                                                        <tr>
                                                            <th style="vertical-align:top">No</th>
                                                            <th style="vertical-align:top">NIS</th>
                                                            <th style="vertical-align:top">Nama</th>
                                                            <th style="vertical-align:top">Pendapatan 1 Bulan</th>
                                                            <th style="text-align:center;">Total Pendapatan</th>
                                                            
                                                            
                                                            
                                                        </tr>
                                                       
                                                    </center>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($crud->hasil as $key=>$data)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$data['nis']}}</td>
                                                                <td>{{$data['nama']}}</td>
                                                                @php
                                                                    $juz = floor($data['totalBulan']/20);
                                                                    $lembar = 0.0;
                                                                    $lembar = fmod($data['totalBulan'], 20)/2; 
                                                                @endphp
                                                                <td>@if($data['totalBulan'] == 0) {{$data['totalBulan']}} Lembar @else @if($juz != 0) {{$juz}}  Juz @endif @if($lembar != 0){{$lembar}} Lembar @endif @endif</td>
                                                                 @php
                                                                    $juz = floor($data['totalPendapatan']/20);
                                                                    $lembar = 0.0;
                                                                    $lembar = fmod($data['totalPendapatan'], 20)/2; 
                                                                @endphp
                                                                <td>@if($data['totalPendapatan'] == 0) {{$data['totalPendapatan']}} Lembar @else @if($juz != 0) {{$juz}}  Juz @endif @if($lembar != 0){{$lembar}} Lembar @endif @endif</td>
                                                            </tr>
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
      var url = "{{ url ('/')}}/{{$crud->getRoute()}}/"+$('#pilihBulan').val()+"/"+$('#pilihTahun').val();
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
            },
          
             // show the export datatable buttons
            dom: '<"p-l-0 col-md-6"l>B<"p-r-0 col-md-6"f>rt<"col-md-6 p-l-0"i><"col-md-6 p-r-0"p>',
            buttons: dtButtons([
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