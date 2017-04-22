 @extends('admin.app')

@section('content')
    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Siswa</h2>   
                    </div>
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                             Form Tambah Siswa
                        </div>
                
                                    <form role="form" style="padding-left:10px; margin-top:10px">
                                        <div class="form-group">
                                                <label>NIS</label>
                                                <input class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                      
                                    </form>
                </div>

                </div>     
                 <!-- /. ROW  -->           
@endsection   
                 <!-- /. ROW  -->           