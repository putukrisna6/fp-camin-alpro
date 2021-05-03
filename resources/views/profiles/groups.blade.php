@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-layer-group fa-sm mr-1"></i> Your Groups</h1>
</div>


<div class="row">
    @foreach ($groups as $group)
        <div class="col-md-6 p-4">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-2 border-bottom-info">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary"><a href="/groups/show/{{$group->id}}">{{ $group->name }}</a></h4>
                    <h6 class="m-0 ml-auto mr-3 text-uppercase">{{ $group->industry }} | {{ $group->visibility }}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p><i class="fas fa-sitemap fa-sm mr-1"></i> Group Members: {{ $group->users->count() }}</p>
                    <hr>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
