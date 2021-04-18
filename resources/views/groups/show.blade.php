@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-1 text-gray-800 ml-2">Group Page</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Add Post</a>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="group-side-bar shadow text-white card text-center">
            <div class="p-3">
                <h2 class="mb-0">{{ $group->name }}</h2>
                <h4 class="text-muted mb-4">{{ $group->industry }} | {{ $group->visibility }}</h4>
                {{-- <hr class="my-4" style="border-top: 1px solid white;"> --}}
                <div class="text-left bg-white text-dark p-3 rounded-lg">
                    <p class="text-muted mb-0">Description</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $group->description }}</p class="">
                    <p class="text-muted mb-0">Visibility</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $group->visibility }}</p class="">
                    <p class="text-muted mb-0">Created at</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $group->created_at }}</p class="">
                </div>
            </div>
            <div class="card-footer rounded-bottom text-dark text-left">
                <a href="/groups/edit/{{ $group->id }}" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger">Leave</a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row ">
            <div class="card mb-4 ml-3 mr-3 shadow">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center"> <img src="{{ asset('img/undraw_profile.svg') }}" class="d-block ui-w-40 rounded-circle" style="max-height: 3rem" alt="">
                        <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{placeholder post author}</a>
                            <div class="text-muted small">{placeholder post create date}</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div>Member since <strong>{placeholder}</strong></div>
                            <div>{placeholder author edu}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p> For me, getting my business website made was a lot of tech wizardry things. Thankfully i get an ad on Facebook ragarding commence website. I get connected with BBB team. They made my stunning website live in just 3 days.
                        With the increase demand of online customers. I had to take my business online. BBB Team guided me at each step and enabled me to centralise my work and have control on all aspect of my online business.
                    </p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                    <div class="px-4 pt-3">
                        <a href="#" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true">
                    </div>
                    <div class="px-4 pt-3"> <button type="button" class="btn btn-primary"><i class="ion ion-md-create"></i>Reply</button> </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
