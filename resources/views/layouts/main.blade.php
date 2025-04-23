<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">🏫 Akademik</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/anggota">Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="/atlet">Atlet</a></li>
                        <li class="nav-item"><a class="nav-link" href="/hasil_pertandingan">Hasil Pertandingan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/juri">Juri</a></li>
                        <li class="nav-item"><a class="nav-link" href="/jadwal_pertandingan">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="/kategori_pertandingan">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
                        <li class="nav-item"><a class="nav-link" href="/pengumuman">Pengumuman</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Konten Halaman -->
    <main class="mt-5 pt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
