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

    @section('script')




    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->
    <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script> <!-- Ckeditor -->
    {{-- <script src="{{ asset('admin/assets/forms/editors.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/ckeditor5-39.0.2-rattyr11dvlk/build/ckeditor.js') }}"></script> --}}

    @yield('script')
  </body>
</html>



{{-- 

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Basic Preset</title>
  <script src="https://cdn.ckeditor.com/4.23.0-lts/basic/ckeditor.js"></script>
</head>

<body>
  <textarea cols="80" id="editor1" name="editor1" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
  <script>
    CKEDITOR.replace('editor1', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });
  </script>
</body>

</html> --}}
