<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">Data Pengguna</a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                @can('admin')
                <li class="nav-item">
                  <a class="nav-link {{ request()->segment('1') == 'films' }} ? 'active' : '' }}" aria-current="page" href="films">
                      <i class="fas fa-film"></i>Film
                  </a></li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->segment('1') == 'data_pengguna' }} ? 'active' : '' }}" aria-current="page" href="data_pengguna"><i class="fas fa-user"></i>Data Pengguna
                    </a>
                  @endcan
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->segment('1') == 'login' }} ? 'active' : '' }}" aria-current="page" href="{{ route('login.logout') }}">
                      <i class="fas fa-power-off"></i>Logout
                  </a>
            </ul>
          </div>
      </nav>
    {{-- End --}}

    {{-- Content --}}
    <div class="mt-2">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

                <h1>Tabel Data Pengguna</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n= 1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $n }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->is_admin)== 1 ? "Admin" : "Pengunjung" }}</td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
