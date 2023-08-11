 @php
    use App\Models\Category;
     $category = Category::where('id', '!=', 1)->orderby('created_at', 'desc')->get();
 @endphp



 <!-- NAVBAR -->
 {{-- <header class="site-navbar mt-3">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

        <nav class="ml-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="index.html" class="nav-link active">Home</a></li>
            <li><a href="about.html">About</a></li>

            <li><a href="contact.html">Contact</a></li>

          </ul>
        </nav>

        <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
          <div class="ml-auto">
            <a href="{{ route('offres.create') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
            <a href="{{ route('login') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
          </div>
          <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>

        </div>

      </div>
    </div>
  </header> --}}


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid py-1">
      <a class="navbar-brand ms-5" href="">Job</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-2 ps-5 pt-2">
          <li class="nav-item">
            <a href="{{ route('job_liste') }}" class="nav-link active me-1" aria-current="page" href="#">Jobs</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin-dashboard') }}" class="nav-link active me-1" aria-current="page" href="#">Dashb</a>
          </li>
          <li class="nav-item dropdown me-1">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catégories
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @foreach ($category as $item)
                <li><a class="dropdown-item" href="{{ route('viewcategory',$item->slug) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
          </li>

          <!-- Authentication Links -->
          @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link me-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link me-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @if(Auth::user()->role == "recruteur")
                    <li class="nav-item">
                        <a href="{{ route('offres.create') }}" class="nav-link btn btn-outline-info me-1" href="#">Post Job</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        {{-- user route --}}
                        @if (Auth::user()->role == "user")
                            <a class="dropdown-item" href="{{ route('diplome-profile') }}"> {{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('diplome-applied') }}"> {{ __('Offre postulé') }}</a>
                            <a class="dropdown-item" href="{{ route('become-company') }}"> {{ __('Devenir employeur') }}</a>
                            <a class="dropdown-item" href="{{ route('diplome-profil_public',Auth::user()->diplome->slug) }}">{{ __('Profile public') }} </a>
                        @endif
                        {{-- company route --}}
                        @if(Auth::user()->role == "recruteur")
                            <a class="dropdown-item" href="{{ route('company-profile') }}">{{ __('Profile') }} </a>
                            <a class="dropdown-item" href="{{ route('company-offres') }}">{{ __('Mes Offres') }} </a>
                            <a class="dropdown-item" href="{{ route('company_public_profile',Auth::user()->company->name) }}">{{ __('Profile public') }} </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Déconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
