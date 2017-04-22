 @extends('admin.app')

@section('content')
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Guru</h2>      
                    </div>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Form Ubah Guru
                        </div>
                                    <form role="form" style="padding-left:10px; margin-top:10px">
                                        <div class="form-group">
                                                <label>No. Guru</label>
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
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                  
                                    </form>


                                  </div>

                                  <div class="panel panel-default">
                                        <div class="panel-heading">
                                             Form Ubah Biodata Guru
                                        </div>
                                                    <form role="form" style="padding-left:10px; margin-top:10px">
                                                        <div class="form-group">
                                                            <label>No. Guru</label>
                                                            <input class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input class="form-control" />
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No.Hp</label>
                                                            <input class="form-control" />
                                                        </div>
                                                            <button type="submit" class="btn btn-primary">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                  
                                                    </form>

                                                    
                                                  </div>

                </div>     
                 <!-- /. ROW  -->           
@endsection   
                 <!-- /. ROW  -->           