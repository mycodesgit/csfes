<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSFES | Log in</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.min.css') }}">
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('style/img/cpsulogo.png') }}">
</head>
   <style>
    .login-box {
        color: green;
    }
    .btn-primary{
        background-color: darkyellow !important;
        border-color: darkyellow !important;
    }
   </style>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body" style="background-color: #04401f;">
                <div class="login-logo" style="text-align: center;">
                    <img src="{{ asset('style/img/logo.png') }}" alt="Your Logo" style="max-width: 150px; max-height: 150px; display: inline-block;">
                </div>
                <!-- /.login-logo -->
                <p class="login-box-msg" style="color: white";>Sign in to start your session</p>
                <form action="{{ route('getLogin') }}" method="post">
                    @csrf
                    
                    @if(session('success'))
                    <div class="alert alert-success" style="font-size: 12pt;">
                        <i class="fas fa-check"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger" style="font-size: 12pt;">
                        <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                    </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" >
                                <label for="remember" style="color: white";>
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: yellowgreen ;border-color: yellowgreen; ">Sign In</button>
                        </div>

                        
                        <!-- /.col -->
                    </div>
                </form>
               
                <!-- /.social-auth-links -->
               
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
</body>
</html>