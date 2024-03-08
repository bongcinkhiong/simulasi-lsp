<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand mb-3" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse mt-1" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item"><a class="nav-link" href="/admin">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/pengguna">Pengguna</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/kota">Kota</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/maskapai">Maskapai</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/rute">Rute</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/jadwal">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/konfirmasi">Konfirmasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/konfirmasi/riwayat">Riwayat</a></li>

                @endif

                @if (Auth::user()->role == 'petugas')
                    <li class="nav-item"><a class="nav-link" href="/petugas">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/petugas/kota">Kota</a></li>
                    <li class="nav-item"><a class="nav-link" href="/petugas/rute">Rute</a></li>
                    <li class="nav-item"><a class="nav-link" href="/petugas/jadwal">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="/petugas/konfirmasi">Konfirmasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/petugas/konfirmasi/riwayat">Riwayat</a></li>
                @endif

                @if (Auth::user()->role == 'pengguna')
                    <li class="nav-item"><a class="nav-link" href="/pengguna">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pengguna/jadwal">Jadwal Penerbangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pengguna/riwayat">Riwayat Pemesanan</a></li>
                @endif

                <li class="nav-item"><p class="nav-link"> Welcome back <b>{{ Auth::user()->nama_lengkap }}</b></p></li>
                <li class="nav-item"><a class=" btn btn-danger" href="/logout">Logout</a></li>
                @endauth
                @if (!Auth::check())
                    <li class="nav-item"><a class="nav-link" href="/">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @endif
            </ul>
          </div>
        </div>
      </nav>
    <nav>

    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
