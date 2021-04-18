@extends('layouts.user')

@section('content')
    <div class="jumbotron shadow-lg bg-navbar text-white">
        <a href="#" class="btn btn-info btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">{{ $mytime }}</span>
        </a>
        <h1 class="display-6">{{ $greetings }}, {{ Auth::user()->name }}</h1>
        <p class="lead">Spare a moment to do something productive today.</p>
        <hr class="my-4" style="border-top: 1px solid white;">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-2">While you were away</h1>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                New Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{placeholder}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Upcoming Events</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{placeholder}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
