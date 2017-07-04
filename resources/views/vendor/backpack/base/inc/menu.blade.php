<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        @if (Auth::guest())
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ trans('backpack::base.login') }}</a></li>
            @if (config('backpack.base.registration_open'))
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/register') }}">{{ trans('backpack::base.register') }}</a></li>
            @endif
        @else
          <!-- <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 

                 <div class="dropdown">
                <a href="#" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()-> name}}
                <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="fa fa-cog"></i>Setting</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </ul>
              </div>
            </div> -->
            <!-- <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li> -->
          <li class="dropdown user user-menu">
                <a href="#" class=" fa fa-user dropdown-toggle" data-toggle="dropdown"> {{Auth::user()-> name}}
                <span class="caret"></span></a>
                
                @if(Auth::user()->level == "Admin")
                <ul class="dropdown-menu dropdown-menu-right" style="width:90px;" >
                  <li><a href="{{ url('admin/editProfil/'.auth()->user()->id.'/edit') }}" style="color:black;"><i class="fa fa-cog"></i>Setting</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}" style="color:black;"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </ul>
                @elseif( Auth::user()->level == "Guru" )
                <ul class="dropdown-menu dropdown-menu-right" style="width:90px;" >
                  <li><a href="{{ url('guru/editProfil/'.auth()->user()->id.'/edit') }}" style="color:black;"><i class="fa fa-cog"></i>Setting</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}" style="color:black;"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </ul>
                @else( Auth::user()->level == "Siswa" )
                <ul class="dropdown-menu dropdown-menu-right" style="width:90px;" >
                  <li><a href="{{ url('siswa/editProfil/'.auth()->user()->id.'/edit') }}" style="color:black;"><i class="fa fa-cog"></i>Setting</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}" style="color:black;"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </ul>
                @endif
        @endif

       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
