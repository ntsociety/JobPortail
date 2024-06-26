@php
use App\Models\Category;
 $category = Category::where('id', '!=', 1)->orderby('created_at', 'desc')->get();
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a href="{{ route('job_liste') }}" class="nav-link active me-1" aria-current="page" href="#">Jobs</a>
          </li>
          <li class="nav-item dropdown me-1">
            <a class="nav-link dropdown-toggle" href="{{ route('category') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catégories
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @foreach ($category as $item)
                <li><a class="dropdown-item" href="{{ route('viewcategory',$item->slug) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('candidats') }}" class="nav-link active me-1" aria-current="page" href="#">Candidats</a>
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
                            <a class="dropdown-item" href="{{ route('employe-account') }}">{{ __('Compte et sécurité') }} </a>
                        @endif
                        {{-- company route --}}
                        @if(Auth::user()->role == "recruteur")
                            <a class="dropdown-item" href="{{ route('company-dashboard') }}">{{ __('Mon compte') }} </a>
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
  </div>
</nav>