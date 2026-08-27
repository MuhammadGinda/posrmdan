<style>
    .navbar.bg-light {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e6e9f7 !important;
        box-shadow: 0 2px 12px rgba(79, 95, 232, 0.06);
    }

    .navbar-brand {
        color: #1e2a4a !important;
        letter-spacing: .02em;
    }

    .navbar .nav-link {
        color: #6b7290 !important;
        font-weight: 500;
        transition: color .15s ease;
    }

    .navbar .nav-link:hover {
        color: #4f5fe8 !important;
    }

    .navbar .nav-link.active {
        color: #4f5fe8 !important;
        position: relative;
    }

    .navbar .nav-link.active::after {
        content: "";
        position: absolute;
        left: 0.5rem;
        right: 0.5rem;
        bottom: -2px;
        height: 2px;
        border-radius: 2px;
        background: linear-gradient(90deg, #4f5fe8, #17b6a7);
    }

    .navbar .btn-danger {
        background: linear-gradient(90deg, #4f5fe8, #17b6a7);
        border: none;
        font-weight: 600;
    }

    .navbar .btn-danger:hover {
        filter: brightness(0.95);
    }

    .navbar-toggler {
        border-color: #e1e4f7;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">POS RMDAN</a>
    <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active fw-semibold' : '' }}" 
             href="{{ route('dashboard') }}">
            Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/users*') ? 'active fw-semibold' : '' }}" 
             href="{{ route('admin.users') }}">
            Users
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link {{ request()->is('jenis*') ? 'active fw-semibold' : '' }}" 
             href="{{ route('jenis.index') }}">
            Jenis
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->is('produk*') ? 'active fw-semibold' : '' }}" 
             href="{{ route('produk.index') }}">
            Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('penjualan*') ? 'active fw-semibold' : '' }}" 
             href="{{ route('penjualan.index') }}">
            Penjualan
          </a>
        </li>
      </ul>
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm px-3">
              Logout
            </button>
          </form>
        </li>

      </ul>

    </div>
  </div>
</nav>