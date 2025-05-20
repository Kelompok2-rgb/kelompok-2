<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Porlempika</title>
    <!-- Favicon -->
    <link href="{{ asset('dashboard/assets/images/logoporlempika.png') }}" rel="icon">
    <link href="{{ asset('dashboard/assets/images/logoporlempika.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Porlempika</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('frontend.indexanggota') }}">Anggota</a></li>
                            <li><a href="{{ route('frontend.indexclub') }}">Club</a></li>
                            <li><a href="{{ route('frontend.indexatlet') }}">Atlet</a></li>
                            <li><a href="{{ route('frontend.indexjadwalpertandingan') }}">Jadwal Pertandingan</a></li>
                            <li><a href="{{ route('frontend.indexhasilpertandingan') }}">Hasil Pertandingan</a></li>
                            <li><a href="{{ route('frontend.indexjuri') }}">Juri</a></li>
                            <li><a href="{{ route('frontend.indexpertandingan') }}">Pertandingan</a></li>
                            <li><a href="{{ route('frontend.indexkategoripertandingan') }}">Kategori Pertandingan</a></li>
                            <li><a href="{{ route('frontend.indexgaleri') }}">Galeri</a></li>
                            <li><a href="{{ route('frontend.indexpengumuman') }}">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="cta-btn" href="{{ route('login') }}">Login</a>
        </div>
    </header>

    <main class="main">
        <section class="section dark-background py-5">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">GALERI PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="mb-3">
                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                    </a>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @forelse ($galeris as $galeri)
                        <div class="col" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm rounded-4 h-100">
                                <img src="{{ asset('uploads/' . $galeri->gambar) }}" 
                                     class="card-img-top" 
                                     alt="{{ $galeri->judul }}"
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $galeri->judul }}</h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center py-4">
                                <i class="bi bi-exclamation-circle me-2"></i> Belum ada data galeri
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Porlempika</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validate.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>
</html>