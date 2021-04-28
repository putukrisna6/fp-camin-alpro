@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-code-branch fa-sm mr-1"></i> Start collaborating</h1>
    <a href="{{ url('groups/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Add Group</a>
</div>

<div class="row">
    @foreach ($groups as $group)
        @if ($group->visibility == 'Public')
            <div class="col-md-6 p-3">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <div class="card">
                        <img class="card-img-top card-img" src="{{ $group->groupImage() }}" alt="Group Image">
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


@endsection
