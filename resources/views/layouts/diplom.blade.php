
<!doctype html>
<html lang="fr">
  <head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/quill.snow.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  </head>
  <body id="top">

  {{-- <div id="overlayer"></div> --}}
  {{-- <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> --}}


<div class="site-wrap">

    {{-- side --}}
    @include('layouts.inc.side')
    {{-- navbar --}}
    @include('layouts.inc.navbar')
    {{-- banner --}}
    @include('layouts.inc.banner')
    @yield('content')

    {{-- footer --}}
    @include('layouts.inc.footer')


</div>

<!-- SCRIPTS -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/stickyfill.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js')}}"></script>

<script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/quill.min.js')}}"></script>


<script src="{{ asset('frontend/js/bootstrap-select.min.js')}}"></script>

<script src="{{ asset('frontend/js/custom.js')}}"></script>

<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->
<script src="{{ asset('assets/forms/editors.js') }}"></script>

</body>
</html>
