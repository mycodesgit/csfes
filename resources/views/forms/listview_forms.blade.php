@extends('layout.master_layout')


@section('body')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Question</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="{{ route('formRead') }}">Forms</a></li>
                        <li class="breadcrumb-item active">Add Question</li>
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('formquestionCreate') }}" method="post" id="addQuestionForm">
                                        <input type="hidden" name="title_id" value="{{ $formtitleID->id }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class='form-row'>
                                                <div class="col-md-12">
                                                    <label>Question:</label>
                                                    <textarea class="form-control" rows="4" name="question"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card card-success card-outline card-outline-tabs">
                                <div class="card-header">
                                    <div class="card-title"></div>

                                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-dark" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Table Question</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">PDF Form Question</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Question</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no=1; @endphp
                                                        @foreach($formtitle as $dataquest)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $dataquest->question }}</td>
                                                            <td>
                                                                

                                                                <a href="{{ route('deleteQuestion', ['id' => $dataquest->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $dataquest->id }}').submit();">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>

                                                                <form id="delete-form-{{ $dataquest->id }}" action="{{ route('deleteQuestion', ['id' => $dataquest->id]) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                                </tr>
                                                            </td>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                            <iframe src="{{ route('PDFSurveyShowTemplate', encrypt($formtitleID->id )) }}" width="100%" height="500"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection