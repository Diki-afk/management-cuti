<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{ asset('assets/images/logo_12.png') }}"  alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('assets/images/logo_12.png') }}" alt="logo" />
          </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Hello, <span class="text-black fw-bold">{{ Auth::user()->namesplit }}</span></h1>
          <h3 class="welcome-sub-text">Have a good activity</h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img rounded-circle" src="{{ Auth::user()->profilePhotoUrl }}" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <strong class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->namesplit }}</strong>
              <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
            </div>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
</nav>