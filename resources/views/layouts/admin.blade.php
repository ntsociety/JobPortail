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

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <body>

    {{-- sidebar --}}
    @include('layouts.inc.admin.sidebar')


    <div class="home-section">
         {{-- navbar --}}
        @include('layouts.inc.admin.navbar')
        <!-- contenu -->
        <div class="home-content">
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    @yield('script')
  </body>
</html>
