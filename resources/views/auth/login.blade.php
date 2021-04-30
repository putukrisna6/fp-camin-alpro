@extends('layouts.app')

@section('content')
<div class="bg-navbar">
    <div class="text-center p-3" style="height: 60rem">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('img/logo/logo.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>

            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
            <div>
                <input
                    type="email"
                    id="email"
                    class="form-control m-1
                    @error('email')
                        is-invalid
                    @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    required autocomplete="email"
                    autofocus placeholder="example@mail.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password" class="sr-only">{{ __('Password') }}</label>
            <div>
                <input type="password" id="password" class="form-control m-1 @error('password') is-invalid @enderror" placeholder="your password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="checkbox mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <p class="mt-0 mb-3 text-muted">© 2021</p>
        </form>
    </div>
</div>
@endsection
