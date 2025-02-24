@extends('layout.master_layout')


@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
             </div>
         </div>
     </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session ('success'))
                        <div class="alert alert-success" style="font-size: 10pt;">
                            <i class="fas fa-check"></i> {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Trainings</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-bars-progress"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Upcoming Trainings</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-bars-progress"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>1</h3>
                            <p>Current Trainings</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-bars-progress"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>1</h3>
                            <p>Canceled Trainings</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-bars-progress"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar-header">
                                <button id="prevMonth">&lt;</button>
                                <span id="calendarMonth"></span>
                                <button id="nextMonth">&gt;</button>
                            </div>
                            <div class="calendar-days">
                                <div>Su</div> <div>Mo</div> <div>Tu</div> <div>We</div> <div>Th</div> <div>Fr</div> <div>Sa</div>
                            </div>
                            <div class="calendar-dates" id="calendarDates"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection