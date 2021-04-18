@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2">Your Groups</h1>
</div>


<div class="row">
    @foreach ($groups as $group)
        <div class="col-md-6 p-4">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                    <h4 class="m-0 font-weight-bold text-primary"><a href="/groups/show/{{$group->id}}">{{ $group->name }}</a></h4>
                    <h6 class="m-0 ml-auto mr-3 text-uppercase">{{ $group->industry }} | {{ $group->visibility }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Leave</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>
                        Group Members
                    </p>
                    <hr>
                    <ul>
                        @foreach ($group->users as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
