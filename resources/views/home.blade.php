@extends('layouts.user')

@section('content')
    <div class="jumbotron">
        <h1 class="display-6">Hello, {{ Auth::user()->name }}</h1>
    </div>
@endsection
