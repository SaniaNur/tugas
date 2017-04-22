 @extends('admin.app')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Program Hafalan</h2>    
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Semua Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Guru Pemimbing</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>4321</td>
                                            <td>Sania Nur Agustina</td>
                                            <td>Siti Maimunah</td>
                                            <td>
                                                <a href="{{url("history")}}" class="btn btn-info">History Hafalan</a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>4321</td>
                                            <td>Sania Nur Agustina</td>
                                            <td>Siti Maimunah</td>
                                            <td>
                                                <a href="{{url("history")}}" class="btn btn-info">History Hafalan</a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>4321</td>
                                            <td>Sania Nur Agustina</td>
                                            <td>Siti Maimunah</td>
                                            <td>
                                                <a href="{{url("history")}}" class="btn btn-info">History Hafalan</a>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>4321</td>
                                            <td>Sania Nur Agustina</td>
                                            <td>Siti Maimunah</td>
                                            <td>
                                                <a href="{{url("history")}}" class="btn btn-info">History Hafalan</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>              
         </div>
                   
                  </div>
                      
                 <!-- /. ROW  -->           
@endsection   
                 <!-- /. ROW  -->           