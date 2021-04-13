@extends('layouts.app')

@section('content')
<div class="bg-navbar">
    <div class="text-center p-3" style="height: 60rem">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="{{ asset('img/logo/logo.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Register an account.</h1>

            <label for="name" class="sr-only">{{ __('Name') }}</label>
            <div>
                <input type="name" id="name" class="form-control m-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="username" class="sr-only">{{ __('Username') }}</label>
            <div>
                <input type="username" id="username" class="form-control m-1 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
            <div>
                <input type="email" id="email" class="form-control m-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password" class="sr-only">{{ __('Password') }}</label>
            <div>
                <input
                    type="password"
                    id="password"
                    class="form-control m-1 @error('password') is-invalid @enderror"
                    placeholder="Password"
                    name="password"
                    required
                    autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label
                for="password-confirm"
                class="sr-only">
                {{ __('Confirm Password') }}
            </label>
            <div>
                <input
                    type="password"
                    id="password-confirm"
                    class="form-control m-1"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    required autocomplete="new-password">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">
                {{ __('Register') }}
            </button>

            <p class="mt-2">
                Already has an account?
               <span><a href="{{ route('login') }}">{{ __('Login') }}</a></span>
                instead
            </p>
            <p class="mt-0 mb-3 text-muted">© 2021</p>
        </form>
    </div>
</div>
@endsection
