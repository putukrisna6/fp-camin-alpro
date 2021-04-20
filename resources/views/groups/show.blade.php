@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Group Page</h1>
    <a href="/posts/create/{{$id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Add Post</a>
</div>

<div class="row">
    @foreach ($group as $g)
        <div class="col-md-4 mb-4">
            <div class="group-side-bar shadow text-white card text-center">
                <div class="p-3">
                    <h2 class="mb-0">{{ $g->name }}</h2>
                    <h4 class="text-muted mb-4">{{ $g->industry }} | {{ $g->visibility }}</h4>
                    <div class="text-left bg-white text-dark p-3 rounded-lg">
                        <p class="text-muted mb-0">Description</p>
                        <hr class="m-0 mb-2">
                        <p class="card-text">{{ $g->description }}</p class="">
                        <p class="text-muted mb-0">Visibility</p>
                        <hr class="m-0 mb-2">
                        <p class="card-text">{{ $g->visibility }}</p class="">
                        <p class="text-muted mb-0">Created at</p>
                        <hr class="m-0 mb-2">
                        <p class="card-text">{{ $g->created_at }}</p class="">
                    </div>
                </div>
                <div class="card-footer rounded-bottom text-dark text-left">
                    <a href="/groups/edit/{{ $g->id }}" class="btn btn-success">Edit</a>
                    <a href="#" class="btn btn-danger">Leave</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-8">
        @foreach ($posts as $p)
            <div class="row d-block pl-3 pr-3">
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center">
                            <img src="{{ asset('img/undraw_profile.svg') }}" class="d-block ui-w-40 rounded-circle" style="max-height: 3rem" alt="">
                            <div class="media-body ml-3"> <a href="#">{{ $p->user->name }}</a>
                                <div class="text-muted small"> {{ date('D, d M Y H:i:s', strtotime($p->created_at)) }}</div>
                            </div>
                            <div class="text-muted small ml-3 text-right">
                                <div><strong>{{ $p->user->profile->profession }}</strong></div>
                                <div>{{ $p->user->profile->education }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p> {{ $p->description }}
                        </p>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3">
                        </div>
                        <div class="px-4 pt-3"> <button type="button" class="btn btn-primary"><i class="ion ion-md-create"></i>Reply</button> </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
