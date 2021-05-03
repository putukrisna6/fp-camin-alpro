@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2"><i class="fas fa-layer-group fa-sm mr-1"></i> Group Page</h1>
    <a href="/posts/create/{{$id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Add Post</a>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="group-side-bar shadow text-white card text-center">
            <div class="p-3">
                <h2 class="mb-0">{{ $group->name }}</h2>
                <h4 class="text-muted mb-4"><i class="fas fa-th fa-sm fa-fw text-white-50"></i> {{ $group->industry }} | {{ $group->visibility }}</h4>
                <div class="text-left bg-white text-dark p-3 rounded-lg mb-3">
                    <p class="text-muted mb-0">Description</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $group->description }}</p class="">
                    <p class="text-muted mb-0">Visibility</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $group->visibility }}</p class="">
                    <p class="text-muted mb-0">Created on</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ date('D, d M Y', strtotime($group->created_at)) }}</p class="">
                </div>
                <div class="text-left bg-white text-dark p-3 rounded-lg mb-3">
                    <p class="text-muted mb-0">Events</p>
                    <hr class="m-0 mb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/calendar" class="btn btn-primary"><i class="fas fa-calendar fa-sm text-white-50 mr-1"></i> Go to calendar</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <a href="/calendar/create/{{ $group->id }}" class="btn btn-info"><i class="fas fa-bookmark fa-sm text-white-50 mr-1"></i> Schedule an event</a>
                        </div>
                    </div>
                </div>
                <div class="text-left bg-white text-dark p-3 rounded-lg">
                    <p class="text-muted mb-0">Group Members</p>
                    <hr class="m-0 mb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/groups/members/{{ $group->id }}" class="btn btn-secondary"><i class="fas fa-user-friends fa-sm text-white-50 mr-1"></i> See who's here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer rounded-bottom text-dark text-left">
                <a href="/groups/edit/{{ $group->id }}" class="btn btn-success mb-2 mr-1"><i class="fas fa-edit fa-sm text-white-50 mr-1"></i> Edit</a>
                <a href="/groups/leave/{{ $group->id }}" class="btn btn-warning mb-2 mr-1"><i class="fas fa-sign-out-alt fa-sm text-white-50 mr-1"></i> Leave</a>
                <a href="/groups/delete/{{ $group->id }}" class="btn btn-danger mb-2 mr-1"><i class="fas fa-trash-alt fa-sm text-white-50 mr-1"></i> Delete</a>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        @foreach ($posts as $p)
            <div class="row d-block pl-3 pr-3">
                <div class="card mb-4 shadow border-left-primary">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center">
                            <img src="{{ $p->user->profile->profileImage() }}" class="d-block ui-w-40 rounded-circle bg-navbar" style="height: 3rem; width: 3rem; object-fit: cover;" alt="">
                            <div class="media-body ml-3">
                                <a href="/profile/show/{{ $p->user->id }}">{{ $p->user->name }}</a>
                                <div class="text-muted small"> {{ date('D, d M Y H:i', strtotime($p->created_at)) }}</div>
                            </div>
                            <div class="text-muted small ml-3 text-right">
                                <div><strong>{{ $p->user->profile->profession }}</strong></div>
                                <div>{{ $p->user->profile->education }}</div>
                            </div>
                            <div class="ml-3 dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                @if ($p->user->id == Auth::user()->id)
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#"><i class="fas fa-edit fa-sm mr-1"></i> Edit Post</a>
                                        <a class="dropdown-item" href="/posts/delete/{{ $p->id }}"><i class="fas fa-trash-alt fa-sm mr-1"></i> Delete Post</a>
                                    </div>
                                @else
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#"><i class="fas fa-flag fa-sm mr-1"></i> Report Post</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <h5>{{ $p->title }}</h5>
                        <p>{{ $p->description }}
                        </p>
                    </div>
                    <div class="card-footer p-0">
                        @foreach ($p->replies as $re)
                            <div class="d-flex py-1" style="border-top: 0.5px solid #e3e6f0 !important; ">
                                <div class="media">
                                    <div class="media-body ml-3">
                                        <div class="small text-primary">
                                            <strong>{{ $re->user->name }}</strong>
                                        </div>
                                    </div>
                                    <div class="ml-3 mr-3">
                                        <div class="text-muted small">
                                            {{ date('d M H:i', strtotime($re->created_at)) }}
                                        </div>
                                        <h5></h5>
                                    </div>
                                </div>
                                <div class="media ml-auto mr-3">
                                    <div class="media-body">
                                        <div class="small">
                                            {{ $re->content }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center p-0">
                        <div class="px-4 pt-3">
                        </div>
                        <form class="form-inline mx-3 my-2" style="width: 20rem" method="post" action="/reply/{{ $p->id }}" enctype="multipart/form-data">
                            @csrf
                            <input id="content"
                                    type="text"
                                    class="form-control  mr-sm-2 @error('content') is-invalid @enderror"
                                    name="content"
                                    value="{{ old('content') }}"
                                    autocomplete="content"
                                    placeholder="Write a reply..."
                                    autofocus>
                            @error('content')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-reply fa-sm mr-1"></i> Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
