<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">Dashboard</a>
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
          </div>
      </nav>
    {{-- End --}}

    {{-- Content --}}
    <div class="mt-2">
        <div class="container">
            @yield('content')
        </div>
    </div>
        </div>
      </nav>
      <div class="card">
        <div class="card-body">
          <div class = "alert alert-info">
            Selamat datang {{ Auth::user()->name }} di havard film
          </div>
        </div>
      </div>
            <div class="container mt-3 text-center mb-5">
              <h3>Berikut Daftar Film Yang Tersedia :</h3>
            <div class="row- justify-content-center g-5">
              <br>
              <div class="row row-cols-4">
                @foreach ($films as $row)
                <div class="col border pt-5">
                  <p><img style="width: 200px" src="{{ asset('storage/'. $row->image)}}"></p>
                  <p style="font-size: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif">{{$row->namafilm}}</p>
                  <p>{{$row->durasi}}</p>
                  <p>{{$row->genre}}</p>
                  <p>{{$row->sutradara}}</p>
                  <p style="text-align: justify">{{$row->sinopsis}}</p>
                </div>
                @endforeach
              </div>
            </div>
        </div>
        <p>{{ $films->links() }}</p>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
