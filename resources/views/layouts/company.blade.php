<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Boxicons CDN Link -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">


    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
  </head>
  <body>

    {{-- sidebar --}}
    @include('layouts.inc.company.sidebar')


    <div class="home-section">
         {{-- navbar --}}
        @include('layouts.inc.company.navbar')
        <!-- contenu -->
        <div class="home-content">
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->
    <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script> <!-- Ckeditor -->
    @yield('script')
  </body>
</html>
