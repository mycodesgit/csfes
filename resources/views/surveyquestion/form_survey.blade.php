<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.min.css') }}">

    <style>
        #alertImage {
            background: url('{{ asset('style/img/formheader.jpg') }}') no-repeat center center;
            background-size: cover;
            height: 100%;
            width: 100%;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            box-shadow: none;
            width: 50%;
            outline: none;
            padding: 5px 0;
        }

        .form-control:focus {
            border-bottom-color: green;
        }

        .card-body label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

    </style>
</head>
<body class="hold-transition layout-top-nav text-sm">
    <div class="wrapper">
    <!-- Navbar -->
    <!-- <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="../../index3.html" class="navbar-brand">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> -->
    <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container"></div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-8 mx-auto">
                            <div class="alert alert-default alert-dismissible" id="alertImage">
                                <h1><br><br></h1>
                            </div>

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
                            <div class="card card-success card-outline card-tabs">
                                <div class="card-body">
                                    <h1>{{ $formlinks->title }}</h1>
                                    <p>Please evaluate the following items by selecting the appropriate checkboxes according to the legend below:</p>
                                    <p><center><strong>(1) Poor &nbsp;&nbsp;&nbsp;&nbsp; (2) Unsatisfactory  &nbsp;&nbsp;&nbsp;&nbsp;(3) Satisfactory &nbsp;&nbsp; &nbsp;&nbsp; (4) Very Satisfactory  &nbsp;&nbsp; &nbsp;&nbsp; (5) Outstanding</strong></center></p>
                                </div>
                            </div>

                            <form method="post" action="{{ route('surveyformCreate') }}" onsubmit="return checkForm(this);">
                                @csrf

                                <input type="hidden" name="title_id" value="{{ $formlinks->id }}">
                                <div class="card">
                                    <div class="card-body">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                        <label>Office</label>
                                        <input type="text" name="office" class="form-control" placeholder="Office" required>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                        <label>Contact Information</label>
                                        <input type="tel" name="contact_information" class="form-control" placeholder="Contact" required>
                                    </div>
                                </div>

                                @foreach($formlinksquestions as $dataformlinksquestions)
                                    <input type="hidden" name="question[]" value="{{ $dataformlinksquestions->id }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ $loop->iteration }}.) {{ $dataformlinksquestions->question }}</h5>
                                            <p class="card-text mt-5">
                                            </p>
                                            <a href="#" class="card-link text-dark"><input type="radio" name="question_rate[{{ $dataformlinksquestions->id }}]" value="1"> <b>1</b></a>
                                            <a href="#" class="card-link text-dark"><input type="radio" name="question_rate[{{ $dataformlinksquestions->id }}]" value="2"> <b>2</b></a>
                                            <a href="#" class="card-link text-dark"><input type="radio" name="question_rate[{{ $dataformlinksquestions->id }}]" value="3"> <b>3</b></a>
                                            <a href="#" class="card-link text-dark"><input type="radio" name="question_rate[{{ $dataformlinksquestions->id }}]" value="4"> <b>4</b></a>
                                            <a href="#" class="card-link text-dark"><input type="radio" name="question_rate[{{ $dataformlinksquestions->id }}]" value="5"> <b>5</b></a>
                                        </div>
                                    </div>
                                @endforeach     
                                
                                <div class="card">
                                    <div class="card-body">
                                        <p>What particular aspect of this training do you think needs improvement? Please identify if there is any:</p>
                                        <input type="text" name="feedback" class="form-control" placeholder="Your Answer" required>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <p>Indicate the topics which you would need for future trainings or workshops</p>
                                        <input type="text" name="feedback2" class="form-control" placeholder="Your Answer" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-md"  onclick="this.disabled=true; this.form.submit();">
                                    <i class="fas fa-save"></i> Submit
                                </button>
                            </form>
                            <br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> -->
    </div>
    <!-- ./wrapper -->

    

    <!-- jQuery -->
    <script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>

    <script>
        function checkForm(form) {
            form.querySelector('button[type="submit"]').disabled = true;
            return true;
        }
    </script>
</body>
</html>
