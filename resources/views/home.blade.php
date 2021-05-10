@extends('layouts.dash')

@section('date-script')
<script type="text/javascript">
    var timestamp = '<?=time();?>';
    function updateTime(){
      $('#time').html(Date(timestamp));
      timestamp++;
    }
    $(function(){
      setInterval(updateTime, 1000);
    });
</script>
@endsection

@section('content')
    <div class="jumbotron shadow-lg bg-navbar text-white">
        <a href="#" class="btn btn-info btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-clock"></i>
            </span>
            <span class="text" id="time"></span>
        </a>
        <h1 class="display-6"><i class="fas fa-door-open fa-sm mr-1"></i> {{ $greetings }}, {{ Auth::user()->name }}</h1>
        <p class="lead">Spare a moment to do something productive today.</p>
        <hr class="my-4" style="border-top: 1px solid white;">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-2">While you were away</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="/calendar" class="text-decoration-none text-warning">Upcoming Event(s)</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $event_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                <a href="/report/index" class="text-decoration-none text-danger">Reported Post(s)</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $report_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-flag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
