<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">POS</a>
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
          <a class="nav-link {{ request()->is('produk*') ? 'active fw-semibold' : '' }}" 
             href="{{ route('produk.index') }}">
            Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('produk*') ? 'active fw-semibold' : '' }}" 
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