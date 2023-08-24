@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow p-4">
                <form method="POST" action="{{ route('login') }}" class="">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <span>Pas de compte ?
                        <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('register') }}
                        </a></span>
                    </div>

                </form>
                {{-- socials account --}}
                <div class="account-bottom">
                    <h5 class="subtitle text-center mb-3">Ou Continuer avec comptes sociaux</h5>
                    <ul class="lab-ul social-icons row ">
                        <li class="col-sm-6 col-6">
                            <a href="{{ route('login_facebook') }}" class="facebook"><p class="btn btn-sm btn-outline-primary w-100">Facebook</p></a>
                        </li>
                        <li class="col-sm-6 col-6">
                            <a href="{{ route('login_google') }}" class="instagram"><p class="btn btn-sm btn-outline-danger w-100">Google</p></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
