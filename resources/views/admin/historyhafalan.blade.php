 @extends('admin.app')

@section('content')
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
                                <li class="active"><a href="#tabel" data-toggle="tab">Tabel</a>
                                </li>
                                <li class=""><a href="#grafik" data-toggle="tab">Grafik</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tabel">
                                    <h4>Tabel</h4>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <center>
                                        <tr>
                                            <th rowspan="2" style="text-align:center;">No</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="5" style="text-align:center;">Ziadah</th>
                                            <th colspan="5" style="text-align:center;">Murojaah</th>
                                            <th rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>Juz</th>
                                            <th>Surat</th>
                                            <th>Dari</th>
                                            <th>Sampai</th>
                                            <th>Nilai</th>
                                            <th>Juz</th>
                                            <th>Surat</th>
                                            <th>Dari</th>
                                            <th>Sampai</th>
                                            <th>Nilai</th>
                                            
                                        </tr>
                                    </center>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>02-03-2016</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>1</td>
                                            <td>Al-Baqoroh</td>
                                            <td>8</td>
                                            <td>20</td>
                                            <td>70</td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="grafik">
                                    <h4>Grafik</h4>
                                    <div class="col-md-6 col-sm-12 col-xs-12">                     
                                      <div style="margin-top:20px" class="panel panel-default">
                                        <div class="panel-heading">
                                        Pencapaian Hafalan Siswa
                                        </div>
                                    <div class="panel-body">
                                      <div id="morris-bar-chart"></div>
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
                
             <!-- /. PAGE INNER  -->
    
                    
                      
                    
             <!-- /. PAGE INNER  -->          
@endsection   
                 <!-- /. ROW  -->           