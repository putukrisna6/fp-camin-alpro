@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Reports on your posts.</h1>
</div>

<div class="row">
    {{-- @foreach ($reports->split($reports->count()/2) as $row)
        @foreach ($row as $report)

        @endforeach
    @endforeach --}}
    @foreach ($reports_group as $reports)
        <div class="col-lg-6">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#post-{{ $reports->first()->post->id }}" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="post-{{ $reports->first()->post->id }}">
                    <div class="media flex-wrap align-items center">
                        <div class="media-body">
                            <h6 class="m-0 text-primary">Post title: <strong>{{ $reports->first()->post->title }}</strong></h6>
                        </div>
                        <div class="text-muted small text-right">
                            Report(s) count: {{ $reports->count() }}
                        </div>
                    </div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="post-{{ $reports->first()->post->id }}" style="">
                    <div class="card-body">
                        <p class="text-muted mb-0">Reasons</p>
                        <hr class="m-0 mb-2">
                        <ul>
                            @foreach ($reports as $r)
                                <li><strong>{{ $r->reportType() }}</strong> at {{ date('d-m-Y', strtotime($r->created_at)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
