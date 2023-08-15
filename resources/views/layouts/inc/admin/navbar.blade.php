 <!-- navbar -->
 <nav>
    <div class="sidebar-button">
      <i class="bx bx-menu sidebarBtn"></i>
      <span class="dashboard">My Store</span>
    </div>
    <div class="user dropdown float-end me-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bx bx-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark bg-main" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item fw-bold text-light" href="#">Profile</a></li>
          <li><a class="dropdown-item fw-bold text-light" href="#">Compte et sécurité</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item fw-bold text-light" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Déconnexion') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
    </div>
  </nav>
