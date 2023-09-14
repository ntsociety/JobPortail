<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
{{-- css --}}
<style>
    ul{
        list-style: none;
    }
    a{
        text-decoration: none !important;
    }
    .card{
        border: none !important;
    }
</style>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow p-4">
                            <h3 class="text-center fw-bolder">Se connecter</h3>
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
                                            {{ __("S'inscrire") }}
                                    </a></span>
                                </div>
            
                            </form>
                            {{-- socials account --}}
                            <style>
                                .social-icons .bx{
                                    font-size: 30px;
                                }
                                .social-icons span{
                                    font-size: 20px;
                                }
                                .social-icons li p{
                                    vertical-align: top !important;
                                }
                            </style>
                            <div class="account-bottom">
                                <h5 class="subtitle text-center mb-3">Ou Continuer avec comptes sociaux</h5>
                                <div class="d-flex justify-content-center">
                                    <div class="col">
                                        <ul class="lab-ul social-icons row ">
                                            <li class="col-12 col-md-6">
                                                <a href="{{ route('login_facebook') }}" class="">
                                                    <p class="btn btn-sm btn-outline-primary w-100">
                                                        <i class='bx bxl-facebook-circle'></i> 
                                                        <span>Facebook</span>
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="col-12 col-md-6">
                                                <a href="{{ route('login_google') }}" class=""><p class="btn btn-sm btn-outline-danger w-100"><i class='bx bxl-google' ></i><span>Google</span></p></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
