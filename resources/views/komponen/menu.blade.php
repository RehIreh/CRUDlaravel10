<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <span class="navbar-brand">Selamat datang, {{ Auth::user()->name }}</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ Auth::user()->role == 'admin' ? '/admin' : '/mahasiswa' }}">Dashboard</a>
              </li>
          </ul>
          <form class="d-flex">
              <a href="/logout" class="btn btn-outline-primary">Logout</a>
          </form>
      </div>
  </div>
</nav>
