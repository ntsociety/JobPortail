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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="col-md-12 col-sm-12 mt-5 me-auto ms-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Hello <i><b>{{ $apply->company->name }} !</b></i></h3>
                        <h4>Je m'appelle <span class="text-uppercase">{{ $apply->diplomer->name }}</span> <span class="text-capitalize">{{ $apply->diplomer->f_name }}</span></h4>
                        <p>J'ai {{ $apply->diplomer->experience_years }} ans</p>
                    </div>
                    <div class="card-body">
                        <h3>A propos de Moi</h3>
                        <p class="text-justify">{{ $apply->diplomer->bio }}</p>
                        <hr>
                        <h5><a href="{{ route('diplome-profil_public',$apply->diplomer->slug) }}" target="_blank">Mon Profile</a></h5>
                        <h3>Cv ci-joint</h3>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <h2>Togo Job Portail</h2>
                        <p>Lomé Togo</p>
                        <p>Rue Alédzo 4K0D</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>
</html>






