 @extends('admin.app')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Input Hafalan</h2>
                    </div>
                </div>
                <div class="panel panel-default">
                        <div class="panel-heading">
                             Hafalan Siswa
                        </div>
                                    <form role="form"style="padding-left:10px; margin-top:10px">
                                        
                                            <div class="form-group input-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis</label>
                                                <select class="form-control">
                                                    <option>Ziadah</option>
                                                    <option>Murojaah</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Juz</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Surah</label>
                                                <select class="form-control">
                                                    <option>Al-Baqoroh</option>
                                                    <option>An-Nisa'</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Dari Ayat</label>
                                                <input class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Sampai Ayat</label>
                                                <input class="form-control" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="submit" class="btn btn-primary">Batal</button>
                                        
                                    </form>
                </div>

                </div>     
                 <!-- /. ROW  -->           
@endsection   
                 <!-- /. ROW  -->           