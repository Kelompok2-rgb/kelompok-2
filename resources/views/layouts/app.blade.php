<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'PORLEMPIKA')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="/">🏫 PORLEMPIKA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="/home"> Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/anggota"> Anggota</a></li>
            <li class="nav-item"><a class="nav-link" href="/atlet"> Atlet</a></li>
            <li class="nav-item"><a class="nav-link" href="/hasil_pertandingan"> Hasil Pertandingan</a></li>
            <li class="nav-item"><a class="nav-link" href="/juri"> Juri </a></li>
            <li class="nav-item"><a class="nav-link" href="/jadwal_pertandingan"> Jadwal </a></li>
            <li class="nav-item"><a class="nav-link" href="/kategori_pertandingan"> Kategori </a></li>
            <li class="nav-item"><a class="nav-link" href="/galeri"> Galeri</a></li>
            <li class="nav-item"><a class="nav-link" href="/pengumuman"> Pengumuman</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Isi halaman -->
    <div class="container py-4 mt-5 pt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
