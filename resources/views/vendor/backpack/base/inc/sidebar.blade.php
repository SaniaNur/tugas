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
                
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          
          
          
                    @if(Auth::user()->level == "Admin") 
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                     <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/guru') }}"><i class="fa fa-dashboard"></i> <span>Data Guru</span></a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/siswa') }}"><i class="fa fa-dashboard"></i> <span>Data Siswa</span></a></li>
                    <!-- <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/juz') }}"><i class="fa fa-dashboard"></i> <span>Daftar Juz</span></a></li> -->

                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/hafalan/create') }}"><i class="fa fa-dashboard"></i> <span>Input Hafalan</span></a></li>
                    

                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/pencapaian') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li>
                    @elseif(Auth::user()->level == "Guru")   
                      <li><a href="{{ url(config('backpack.base.route_prefix', 'guru').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'guru').'/hafalan') }}"><i class="fa fa-dashboard"></i> <span>Input Hafalan </span></a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'guru').'/pencapaian') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li>
                    @elseif( Auth::user()->level == "Siswa" )
                     <li><a href="{{ url(config('backpack.base.route_prefix', 'siswa').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'siswa').'/pencapaian') }}"><i class="fa fa-dashboard"></i> <span>Program Hafalan</span></a></li>
                    @else           
                    @endif


          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
