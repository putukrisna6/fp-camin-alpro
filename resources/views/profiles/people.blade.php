@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-address-book fa-sm mr-1"></i> Meet New People</h1>
    <div>
        <div class="d-none d-sm-inline-block">
            <form action="/people" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-1 mt-1">
                        <button class="d-none d-sm-inline-block btn btn-sm btn-info" type="submit" title="Search someone">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control border-0 mr-1 mt-1 rounded-lg" style="height: 2rem;" name="name" placeholder="Search Someone" required id="name">
                </div>
            </form>
        </div>
        <a href="{{ url('people') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-trash-restore fa-sm text-white-50 mr-1"></i> Reset Filters</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @if ($people->count() == 1)
            @foreach ($people as $person)
                @if ($person->id != Auth::user()->id)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card clean-card text-center">
                            <img src="{{ $person->profile->profileImage() }}" class="card-img-top w-100 d-block">
                            <div class="card-body info">
                                <h4 class="card-title">
                                    <strong>{{ $person->name }}</strong>
                                    <br>
                                </h4>
                                <p class="card-text">{{ $person->profile->profession }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            @foreach ($people->split($people->count()/2) as $row)
                @foreach ($row as $person)
                    @if ($person->id != Auth::user()->id)
                        <div class="col-sm-6 col-lg-3 mb-3">
                            <div class="card clean-card text-center">
                                <img src="{{ $person->profile->profileImage() }}" class="card-img-top w-100 d-block">
                                <div class="card-body info">
                                    <h4 class="card-title">
                                        <strong>{{ $person->name }}</strong>
                                        <br>
                                    </h4>
                                    <p class="card-text">{{ $person->profile->profession }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endif
    </div>
</div>

@endsection
