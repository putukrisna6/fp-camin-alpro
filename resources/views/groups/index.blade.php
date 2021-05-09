@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-code-branch fa-sm mr-1"></i> Start collaborating</h1>
    <div>
        <div class="d-none d-sm-inline-block">
            <form action="/groups/index" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-1 mt-1">
                        <button class="d-none d-sm-inline-block btn btn-sm btn-info" type="submit" title="Search groups">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control border-0 mr-1 mt-1 rounded-lg" style="height: 2rem;" required name="name" placeholder="Search groups" id="name">
                </div>
            </form>
        </div>
        <div class="dropdown d-none d-sm-inline-block">
            <button class="d-none d-sm-inline-block btn btn-sm btn-white shadow-sm dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-filter fa-sm mr-1"></i> Filter Industry
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li class="my-1"><a class="ml-2" href="?industry=tech">Tech</a></li>
                  <li class="mb-1"><a class="ml-2" href="?industry=education">Education</a></li>
                  <li class="mb-1"><a class="ml-2" href="?industry=healthcare">Healthcare</a></li>
                  <li class="mb-1"><a class="ml-2" href="?industry=banking">Banking</a></li>
                </ul>
        </div>
        <a href="{{ url('groups/index') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-trash-restore fa-sm text-white-50 mr-1"></i> Reset Filters</a>
        <a href="{{ url('groups/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Add Group</a>
    </div>
</div>

<div class="row">
    @foreach ($groups as $group)
        @if ($group->visibility == 'Public')
            <div class="col-md-6 p-3">
                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <div class="card">
                        <a href="{{ $group->groupImage() }}">
                            <img class="card-img-top card-img" src="{{ $group->groupImage() }}" alt="{{ $group->name }}">
                        </a>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title font-weight-bold text-primary">{{ $group->name }}</h5>
                            </div>
                            <div class="col-md-6 pr-4 text-uppercase d-flex justify-content-md-end">
                                <h6><i class="fas fa-tag fa-sm mr-1"></i> {{ $group->industry }}</h6>
                            </div>
                        </div>
                        <p class="card-text">{{ $group->description }}</p>
                        <a href="/groups/add/{{ $group->id }}" class="btn btn-primary"><i class="fas fa-sign-in-alt fa-sm text-white-50 mr-1"></i> Join</a>
                        <hr>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-clock fa-sm mr-1"></i> Created at: {{ $group->created_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

<div class="container justify-content-center d-flex">
    <span>
        {{ $groups->links("pagination::bootstrap-4") }}
    </span>
</div>
@endsection
