@extends('layouts.app')

@section('content')
<div class="bg-navbar">
    <div class="text-center p-3" style="height: 60rem">
        <form class="form-signin" method="POST" action="{{ route('change.password') }}">
            @csrf
            <img class="mb-4" src="{{ asset('img/logo/logo.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Change your password</h1>

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="">
                <input
                    id="password"
                    type="password"
                    class="form-control m-1"
                    name="current_password"
                    autocomplete="current-password"
                    placeholder="Old Password">
            </div>

            <div class="">
                <input id="new_password"
                    type="password" class="form-control m-1"
                    name="new_password"
                    autocomplete="current-password"
                    placeholder="New Password">
            </div>

            <div class="">
                <input
                    id="new_confirm_password"
                    type="password"
                    class="form-control m-1"
                    name="new_confirm_password"
                    autocomplete="current-password"
                    placeholder="Confirm New Password">
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">
                Update Password
            </button>
        </form>
    </div>
</div>
@endsection
