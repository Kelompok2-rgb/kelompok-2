<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PORLEMPIKA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">PORLEMPIKA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('anggota') ? 'active fw-bold' : '' }}" href="/anggota">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('atlet') ? 'active fw-bold' : '' }}" href="/atlet">Atlet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('hasil_pertandingan') ? 'active fw-bold' : '' }}" href="/hasil_pertandingan">Hasil Pertandingan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('juri') ? 'active fw-bold' : '' }}" href="/juri">Juri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('jadwal_pertandingan') ? 'active fw-bold' : '' }}" href="/jadwal_pertandingan">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kategori_pertandingan') ? 'active fw-bold' : '' }}" href="/kategori_pertandingan">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active fw-bold' : '' }}" href="/galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pengumuman') ? 'active fw-bold' : '' }}" href="/pengumuman">Pengumuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi halaman -->
    <div class="container py-4 mt-5 pt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
