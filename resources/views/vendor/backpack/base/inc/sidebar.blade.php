@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          
          
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="text-center">
                    <img src="{{asset("/binaryAdmin/assets/img/logo.jpg")}}" class="user-image img-responsive"/>
                    </li>
                
          <li class="header">Main Navigation</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          
          
          
                    @if(Auth::user()->level == "Admin") 
                    <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                     <li><a href="{{ url('admin/guru') }}"><i class="fa fa-dashboard"></i> <span>Data Guru</span></a></li>
                    <li><a href="{{ url('admin/siswa') }}"><i class="fa fa-dashboard"></i> <span>Data Siswa</span></a></li>
                    <!-- <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/juz') }}"><i class="fa fa-dashboard"></i> <span>Daftar Juz</span></a></li> -->

                    <li><a href="{{ url('admin/hafalan/create') }}"><i class="fa fa-dashboard"></i> <span>Input Hafalan</span></a></li>
                    

                    <li><a href="{{ url('admin/pencapaian') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li>
                    <li><a href="{{ url('admin/laporan') }}"><i class="fa fa-dashboard"></i> <span>Laporan</span></a></li>
                    @elseif(Auth::user()->level == "Guru")   
                      <li><a href="{{ url('guru/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                    <li><a href="{{ url('guru/hafalan/create') }}"><i class="fa fa-dashboard"></i> <span>Input Hafalan </span></a></li>
                    <li><a href="{{ url('guru/pencapaian') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li>
                    <li><a href="{{ url('guru/laporan') }}"><i class="fa fa-dashboard"></i> <span>Laporan</span></a></li>
                    @else( Auth::user()->level == "Siswa" )
                     <li><a href="{{ url('siswa/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                    <!-- <li><a href="{{ url('siswa/history') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li> -->
                   <li><a href="{{ url('siswa/laporan') }}"><i class="fa fa-dashboard"></i> <span>Pencapaian Hafalan</span></a></li>
                    @endif


          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <!-- @if(Auth::user()->level == "Guru")
          <li><a href="{{ url('guru/profil/'.auth()->user()->id.'/edit') }}"><i class="fa fa-users"></i> <span>Profil</span></a></li>
          @else( Auth::user()->level == "Siswa" )
          <li><a href="{{ url('siswa/profil/'.auth()->user()->id.'/edit') }}"><i class="fa fa-users"></i> <span>Profil</span></a></li>
          @endif -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
