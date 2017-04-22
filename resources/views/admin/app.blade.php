<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset("/binaryAdmin/assets/css/bootstrap.css")}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset("/binaryAdmin/assets/css/font-awesome.css")}}" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset("/binaryAdmin/assets/js/morris/morris-0.4.3.min.css")}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset("/binaryAdmin/assets/css/custom.css")}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 
            </div>

                                      
                                   
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 

                 <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()-> name}}
                <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#">Setting</a></li>
                  <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </ul>
              </div>
            </div>
            
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
                    
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="{{asset("/binaryAdmin/assets/img/logo.jpg")}}" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li>
                        <a class="active-menu"  href="{{url("dashboard")}}"> Halaman Utama</a>
                    </li>
                    @if(Auth::user()->level == "admin") 
                     <li>
                        <a  href="{{url("dataguru")}}"> Data Guru</a>
                    </li>
                    <li>
                        <a  href="{{url("datasiswa")}}"> Data Siswa</a>
                    </li>
                              <li  >
                        <a   href="{{url("daftar-juz")}}"> Daftar Juz</a>
                    </li>
                    <li>
                        <a href="{{url("input")}}"> Input Hafalan</a>
                    </li>
                    <li>
                        <a href="{{url("program-hafalan")}}"> Program hafalan </a>
                    </li>
                    @elseif(Auth::user()->level == "guru")   
                      <li>
                        <a href="{{url("input")}}"> Input Hafalan</a>
                    </li>
                    <li>
                        <a href="{{url("program-hafalan")}}"> Program hafalan </a>
                    </li>
                    @elseif( Auth::user()->level == "siswa" )
                    <li>
                        <a href="{{url("program-hafalan")}}"> Program hafalan </a>
                    </li>
                    @else           
                    @endif
                </ul>
               
            </div>
            
        </nav>  
            @yield('content')
                </div>     
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset("/binaryAdmin/assets/js/jquery-1.10.2.js")}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset("/binaryAdmin/assets/js/bootstrap.min.js")}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset("/binaryAdmin/assets/js/jquery.metisMenu.js")}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset("/binaryAdmin/assets/js/morris/raphael-2.1.0.min.js")}}"></script>
    <script src="{{asset("/binaryAdmin/assets/js/morris/morris.js")}}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset("/binaryAdmin/assets/js/custom.js")}}"></script>


    <script src="{{asset("/binaryAdmin/assets/js/dataTables/jquery.dataTables.js")}}"></script>
    <script src="{{asset("/binaryAdmin/assets/js/dataTables/dataTables.bootstrap.js")}}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="{{asset("/binaryAdmin/assets/js/custom.js")}}"></script>
    
   
</body>
</html>
