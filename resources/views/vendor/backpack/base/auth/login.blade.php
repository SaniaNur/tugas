<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset("/form-1/assets/bootstrap/css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{asset("/form-1/assets/font-awesome/css/font-awesome.min.css")}}">
        <link rel="stylesheet" href="{{asset("/form-1/assets/css/form-elements.css")}}">
        <link rel="stylesheet" href="{{asset("/form-1/assets/css/style.css")}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset("/form-1/assets/ico/favicon.png")}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset("/form-1/assets/ico/apple-touch-icon-144-precomposed.png")}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset("/form-1/assets/ico/apple-touch-icon-114-precomposed.png")}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset("/form-1/assets/ico/apple-touch-icon-72-precomposed.png")}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset("/form-1/assets/ico/apple-touch-icon-57-precomposed.png")}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        
            <div class="inner-bg">
                <!-- <h3>Assalamualaikum Wr. Wb.</h3>
                <h4>Ini adalah situs yang mengakses semua yang berhubungan dengan program Tahfidzul</h4> -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login</h3>
                                    <h5>haiiiiii</h5>
                                    
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                   <!-- <a type="submit" class="btn btn-primary"  style="width:100px">Login</a> -->
                                   <button type="submit" class="btn btn-primary"  style="width:100px">Login</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
             <!-- Jika terjadi kesalahan harap hubungi Administrator -->  
            </div>
             
        </div>


        <!-- Javascript -->
        <script src="{{asset("/form-1/assets/js/jquery-1.11.1.min.js")}}"></script>
        <script src="{{asset("/form-1/assets/bootstrap/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("/form-1/assets/js/jquery.backstretch.min.js")}}"></script>
        <script src="{{asset("/form-1/assets/js/scripts.js")}}"></script>
        
        <!--[if lt IE 10]>
            <script src="{{asset("/form-1/assets/js/placeholder.js")}}"></script>
        <![endif]-->

    </body>

</html>