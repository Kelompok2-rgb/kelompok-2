<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Frontend - Porlempika</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link href="{{ asset('dashboard/assets/images/logoporlempika.png') }}" rel="icon">
    <link href="{{ asset('dashboard/assets/images/logoporlempika.png') }}" rel="apple-touch-icon">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Files Langsung dari Folder css -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .anggota-img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: zoom-in;
        }

        .anggota-img.enlarged {
            transform: scale(3);
            z-index: 999;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(3);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 1);
        }
    </style>


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Porlempika</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#rules">Rules</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li class="dropdown"><a href="#"><span>Menu</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#fitur">Jadwal Pertandingan</a></li>
                            <li><a href="#fitur">Kategori Pertandingan</a></li>
                            <li><a href="#fitur">Galeri</a></li>
                            <li><a href="#fitur">Pengumuman</a></li>
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

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('frontend/assets/images/porlempika.png') }}" alt="" data-aos="fade-in">


            <div class="container d-flex flex-column align-items-center">
                <h2 data-aos="fade-up" data-aos-delay="100">Berbeda. Bersatu. Berjaya.</h2>
                <p data-aos="fade-up" data-aos-delay="200">Sistem Informasi Pengelolaan Persatuan Lempar Pisau & Kapak
                    Kota Padang</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>

        </section><!-- /Hero Section -->



        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h1>Porlempika</h1>
                        <img src="{{ asset('frontend/assets/images/thumbnail.png') }}" class="img-fluid rounded-4 mb-4"
                            alt="">
                        <p>Porlempika terus berupaya mempopulerkan lempar pisau dan kapak sebagai olahraga yang aman,
                            kompetitif, dan menghibur. Dengan slogan "Berbeda, Bersatu, Berjaya!", federasi ini
                            mendorong kolaborasi antar-komunitas dan atlet dari berbagai daerah. Melalui kejuaraan
                            nasional dan pelatihan, Porlempika berkomitmen untuk meningkatkan prestasi atlet Indonesia
                            di kancah internasional sekaligus melestarikan olahraga yang unik ini.</p>

                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">


                            <p>
                                Porlempika (Perkumpulan Olahraga Lempar Pisau dan Kapak Indonesia) adalah organisasi
                                resmi yang mewadahi olahraga lempar pisau dan kapak di Indonesia. Federasi ini dibentuk
                                pada tahun 2017 sebagai hasil pengembangan dari komunitas D'Lempar Pisau Indonesia, yang
                                awalnya digagas oleh mahasiswa Seni Rupa ITB pada akhir 1980-an. Porlempika bertujuan
                                untuk memajukan olahraga ini secara profesional, termasuk mengatur regulasi,
                                mengoordinasikan kegiatan, dan memperjuangkan pengakuan dari Komite Olahraga Nasional
                                Indonesia (KONI). Saat ini, Porlempika memiliki jaringan luas dengan 13 Pengurus Daerah,
                                27 Pengurus Cabang, dan 37 klub di seluruh Indonesia.
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ asset('frontend/assets/images/porlempika.png') }}"
                                    class="img-fluid rounded-4" alt="">
                                <a href="#" class="glightbox pulsating-play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-person color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAnggota }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Anggota</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-people color-orange flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahKlub }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Klub</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-trophy color-green flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAtlet }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Atlet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-award color-pink flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahJuri }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Juri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /Stats Section -->

        <!-- Services Section -->
        <section id="rules" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Porlempika</h2>
                <p>Standar Kompetisi<br></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item text-center"> <!-- Tambah text-center supaya isi rata tengah -->
                            <div class="img mb-3"> <!-- kasih margin bawah agar jarak -->
                                <img src="{{ asset('frontend/assets/images/pisau.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon mb-2">
                                    <i class=""></i>
                                    <!-- ukuran icon bisa diatur -->
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Pisau</h3>
                                </a>
                                <p style="text-align: justify;"> Dalam olahraga lempar pisau, standar internasional
                                    mengatur bahwa panjang pisau yang digunakan berkisar antara 10 hingga 16 inci
                                    (sekitar 25,4 hingga 40,6 cm), dengan berat antara 340 hingga 680 gram. Pisau harus
                                    memiliki desain yang seimbang agar dapat dilempar dengan baik, dan biasanya dilempar
                                    dengan memegang bagian gagangnya. Gaya lemparan harus konsisten dan akurat untuk
                                    mencapai target dengan sudut yang tepat.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item text-center">
                            <div class="img mb-3">
                                <img src="{{ asset('frontend/assets/images/kapak.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon mb-2">
                                    <i class=""></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Kapak</h3>
                                </a>
                                <p style="text-align: justify;">Kapak yang digunakan dalam kompetisi memiliki panjang
                                    gagang antara 13 hingga 17 inci (sekitar 33 hingga 43 cm) dan berat total antara 1,5
                                    hingga 2,5 pon (sekitar 680 hingga 1.130 gram). Kepala kapak biasanya memiliki
                                    panjang antara 5 hingga 7 inci dan tinggi antara 1,5 hingga 4 inci. Kapak harus
                                    terbuat dari satu bagian logam yang utuh tanpa modifikasi tambahan, selain dari
                                    penajaman bilahnya. Kapak ini dirancang agar seimbang dan stabil saat dilempar dari
                                    jarak tertentu.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item text-center">
                            <div class="img mb-3">
                                <img src="{{ asset('frontend/assets/images/jarak.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon mb-2">
                                    <i class=""></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Jarak</h3>
                                </a>
                                <p style="text-align: justify;">Jarak lempar dalam olahraga ini disesuaikan dengan
                                    jenis alat yang digunakan. Untuk pisau, jarak minimal yang digunakan adalah 4 meter,
                                    dan bisa ditambah dalam kelipatan 3 meter untuk kategori lanjutan. Sementara itu,
                                    untuk kapak, jarak standar antara garis lempar dan target adalah 12 kaki atau
                                    sekitar 3,66 meter. Penentuan jarak ini penting untuk memastikan rotasi alat yang
                                    tepat sebelum mengenai target.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item text-center">
                            <div class="img mb-3">
                                <img src="{{ asset('frontend/assets/images/target.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon mb-2">
                                    <i class=""></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Target</h3>
                                </a>
                                <p style="text-align: justify;">Target untuk lempar pisau umumnya memiliki diameter
                                    sekitar 1 meter, dengan pusat target diletakkan pada ketinggian sekitar 1,25 meter
                                    dari permukaan tanah. Sementara itu, target untuk lempar kapak memiliki diameter
                                    sekitar 24 inci (61 cm), dengan pusat atau bullseye berada pada ketinggian 60 inci
                                    (152,4 cm). Target dilengkapi dengan zona skor seperti lingkaran pusat (bullseye)
                                    dan area tambahan seperti "killshots" untuk tingkat kesulitan yang lebih tinggi
                                    dalam penilaian.</p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('dashboard/assets/images/logoporlempika.png') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('dashboard/assets/images/logokel2.jpg') }}" class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('frontend/assets/images/Logo_pnp.png') }} " class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('frontend/assets/images/Logo_satgaspnp.png') }} "class="img-fluid"
                            alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('frontend/assets/images/menwa.png') }}" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="{{ asset('frontend/assets/images/koni.png') }}"class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Features Section -->
        <section id="fitur" class="features section">

            <div class="container">

                <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item col-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-calendar-event-fill"></i>
                            <h4 class="d-none d-lg-block"> Jadwal Pertandingan </h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-list-ul"></i>
                            <h4 class="d-none d-lg-block"> Kategori Pertandingan </h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi-images"></i>
                            <h4 class="d-none d-lg-block">Galeri</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                            <i class="bi bi-megaphone-fill"></i>
                            <h4 class="d-none d-lg-block"> Pengumuman </h4>
                        </a>
                    </li>
                </ul><!-- End Tab Nav -->

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div>

                                <div class="text-center mb-4">
                                    <h2>Jadwal Pertandingan</h2>
                                    <hr>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped text-center tableExportArea">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pertandingan</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Lokasi</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwalpertandingans as $jadwal)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $jadwal->pertandingan->nama_pertandingan ?? '-' }}</td>
                                                    <td>{{ optional($jadwal->tanggal)->format('d/m/Y') }}</td>
                                                    <td>{{ optional(\Carbon\Carbon::parse($jadwal->waktu))->format('H:i') }}
                                                    </td>
                                                    <td>{{ $jadwal->lokasi }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($jadwal->deskripsi, 50) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        {{-- Inline Style untuk membatasi panjang konten kolom --}}
                        <style>
                            td {
                                max-width: 200px;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                            }
                        </style>
                    </div>


                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div>

                                <div class="text-center mb-4">
                                    <h2>Kategori Pertandingan</h2>
                                    <hr>
                                </div>


                                <table id="example"
                                    class="table table-bordered table-striped mt-3 text-center tableExportArea">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aturan</th>
                                            <th>Batasan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoripertandingans as $index => $kategori)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $kategori->nama }}</td>
                                                <td>{{ $kategori->aturan }}</td>
                                                <td>{{ $kategori->batasan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Tab Content Item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div>
                                <div class="text-center mb-4">
                                    <h2>Galeri</h2>
                                    <hr>
                                </div>

                                @if ($galeris->isEmpty())
                                    <div class="col-12 text-center">
                                        <p>Belum ada galeri.</p>
                                    </div>
                                @else
                                    <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($galeris as $index => $galeri)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <img src="{{ asset('uploads/' . $galeri->gambar) }}"
                                                            class="d-block rounded" alt="{{ $galeri->judul }}"
                                                            style="max-height: 450px; object-fit: cover; width: 100%; max-width: 800px;">
                                                        <div class="mt-3 text-center text-dark">
                                                            <h5 class="fw-bold">{{ $galeri->judul }}</h5>
                                                            <p>{{ $galeri->deskripsi }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Controls --}}
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#galeriCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Sebelumnya</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#galeriCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Berikutnya</span>
                                        </button>
                                    </div>
                                @endif

                                <style>
                                    .carousel-inner {
                                        background-color: #ffffff;
                                        border-radius: 12px;
                                        padding: 20px;
                                    }

                                    .carousel-item {
                                        transition: transform 0.6s ease, opacity 0.6s ease;
                                    }

                                    .carousel-control-prev-icon,
                                    .carousel-control-next-icon {
                                        background-color: rgba(0, 0, 0, 0.5);
                                        border-radius: 50%;
                                    }

                                    .carousel-caption {
                                        background-color: rgba(0, 0, 0, 0.5);
                                        border-radius: 10px;
                                    }
                                </style>

                            </div>

                        </div>
                    </div><!-- End Tab Content Item -->

                    <div class="tab-pane fade" id="features-tab-4">
                        <div class="row">
                            <div class="container py-5">
                                <h2 class="text-center">
                                    Pengumuman
                                </h2>
                                <hr class="mb-5">
                                <div class="text-center mb-4">
                                    <h2>Galeri</h2>
                                    <hr>
                                </div>

                                @if ($pengumumans->isEmpty())
                                    <div class="text-center">
                                        <p class="text-muted">Belum ada pengumuman.</p>
                                    </div>
                                @else
                                    <div id="pengumumanCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($pengumumans as $index => $item)
                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                    <div class="row g-4 align-items-center">
                                                        {{-- Kolom Informasi --}}
                                                        <div class="col-md-6">
                                                            <div class="p-3" style="word-wrap: break-word;">
                                                                <h3 class="fw-bold text-dark">{{ $item->judul }}</h3>
                                                                <p class="text-muted mb-2">
                                                                    <i class="bi bi-calendar-event me-1"></i>
                                                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                                                </p>
                                                                <hr>
                                                                <div class="text-secondary overflow-auto"
                                                                    style="max-height: 280px; text-align: justify; word-break: break-word;">
                                                                    {!! nl2br(e($item->isi)) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Kolom Gambar --}}
                                                        <div class="col-md-6 text-center">
                                                            @if ($item->foto)
                                                                <img src="{{ asset('uploads/pengumuman/' . $item->foto) }}"
                                                                    class="img-fluid rounded shadow-sm"
                                                                    alt="Foto Pengumuman"
                                                                    style="max-height: 350px; object-fit: cover; width: 100%;">
                                                            @else
                                                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded"
                                                                    style="height: 300px;">
                                                                    Tidak ada foto
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Navigasi Carousel --}}
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#pengumumanCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                                                aria-hidden="true"></span>
                                            <span class="visually-hidden">Sebelumnya</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#pengumumanCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"
                                                aria-hidden="true"></span>
                                            <span class="visually-hidden">Berikutnya</span>
                                        </button>
                                    </div>
                                @endif
                            </div>


                        </div><!-- End Tab Content Item -->

                    </div>

                </div>

        </section><!-- /Features Section -->


        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title my-3" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>Cek Portofolio Kami</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    <div class="text-center">Belum ada Portfolio</div>

                </div>

            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section dark-background">

            <img src="{{ asset('frontend/assets/images/thumbnail.png') }}" class="testimonials-bg" alt="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('frontend/assets/images/muhammad_ali.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Muhammad Ali</h3>
                                <h4>Petinju Legendaris</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Saya membenci setiap menit latihan, tapi saya berkata: Jangan menyerah.
                                        Deritalah sekarang dan hiduplah sebagai juara seumur hidup</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('frontend/assets/images/Serena_Williams.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Serena Williams</h3>
                                <h4>Petenis Profesional</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Seorang juara tidak ditentukan dari seberapa sering ia menang, tapi dari
                                        bagaimana ia bangkit setiap kali terjatuh.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('frontend/assets/images/jordan.jpg') }}" class="testimonial-img"
                                    alt="">
                                <h3>Michael Jordan</h3>
                                <h4>Pebasket NBA</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Saya gagal lebih dari 9.000 kali dalam karier saya. Saya kalah di hampir 300
                                        pertandingan... Dan karena itulah saya berhasil</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('frontend/assets/images/Usain_Bolt.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Usain Bolt</h3>
                                <h4>Pelari Olimpiade</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Jangan terlalu memikirkan bagaimana kamu memulai, fokuslah pada bagaimana kamu
                                        akan mengakhiri.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('frontend/assets/images/Khabib_Nurmagomedov.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Khabib Nurmagomedov</h3>
                                <h4>Petarung MMA (Juara Dunia UFC)</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Jika kamu punya tujuan dan mimpi, jangan pernah menyerah untuk
                                        mencapainya.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->


        <section id="anggota">
            @yield('content')
        </section>


        <!-- Services 2 Section -->
        <section id="services-2" class="services-2 section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Porlempika</h2>
                <p>Susunan organisasi</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex position-relative h-100">
                            <!-- Ganti icon dengan foto -->
                            <img src="{{ asset('frontend/assets/images/zahadi.jpg') }}" alt="Foto Ketua"
                                class="flex-shrink-0 rounded-circle me-3"
                                style="width: 100px; height: 100px; object-fit: cover;">

                            <div>
                                <h4 class="title">
                                    <p>Ketua</p>
                                </h4>
                                <p class="description">
                                    Selalu waspada terhadap lingkungan sekitar anda, yakinkan tidak ada anak-anak
                                    atau hewan di sekitar tempat anda berlatih.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex position-relative h-100">
                            <!-- Ganti icon dengan foto -->
                            <img src="{{ asset('frontend/assets/images/yara.jpg') }}" alt="Foto Ketua"
                                class="flex-shrink-0 rounded-circle me-3"
                                style="width: 100px; height: 100px; object-fit: cover;">

                            <div>
                                <h4 class="title">
                                    <p>Wakil Ketua</p>
                                </h4>
                                <p class="description">
                                    Selalu waspada terhadap lingkungan sekitar anda, yakinkan tidak ada anak-anak
                                    atau hewan di sekitar tempat anda berlatih.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex position-relative h-100">
                            <!-- Ganti icon dengan foto -->
                            <img src="{{ asset('frontend/assets/images/vani.jpg') }}" alt="Foto Ketua"
                                class="flex-shrink-0 rounded-circle me-3"
                                style="width: 100px; height: 100px; object-fit: cover;">

                            <div>
                                <h4 class="title">
                                    <p>Sekretaris</p>
                                </h4>
                                <p class="description">
                                    Selalu waspada terhadap lingkungan sekitar anda, yakinkan tidak ada anak-anak
                                    atau hewan di sekitar tempat anda berlatih.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex position-relative h-100">
                            <!-- Ganti icon dengan foto -->
                            <img src="{{ asset('frontend/assets/images/dapi.jpg') }}" alt="Foto Ketua"
                                class="flex-shrink-0 rounded-circle me-3"
                                style="width: 100px; height: 100px; object-fit: cover;">

                            <div>
                                <h4 class="title">
                                    <p>Bendahara</p>
                                </h4>
                                <p class="description">
                                    Selalu waspada terhadap lingkungan sekitar anda, yakinkan tidak ada anak-anak
                                    atau hewan di sekitar tempat anda berlatih.
                                </p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- /Services 2 Section -->




        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Porlempika Kota Padang</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6 ">
                        <div class="row gy-4">

                            <div class="col-lg-12">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>Komp Sinar Limau Manis D13, Kel. Koto Luar, Kec. Pauh.</p>
                                    <a href="{{ url('/cek-rute') }}" class="btn btn-primary mt-2">
                                        📍 Cek Rute ke Lokasi
                                    </a>
                                </div>
                            </div><!-- End Info Item -->


                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Admin</h3>
                                    <p>082170657217</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Kami</h3>
                                    <p>porlempikapadang@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

        <!-- Team Section -->
        <section id="team" class="team section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tim</h2>
                <p>PENGEMBANG</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('frontend/assets/images/zahadi.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Zahadi Rizfy</h4>
                                <span>Project Manager</span>
                                <div class="social">
                                    <a href="https://www.instagram.com/zahadirizfy_?igsh=YnNuOWg1cjllOHA="><i
                                            class="bi bi-instagram"></i></a>

                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('frontend/assets/images/yara.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Syarah Izzati</h4>
                                <span>UI/UX Designer</span>
                                <div class="social">

                                    <a href="https://www.instagram.com/syarazzl?igsh=MWR0Nnpub2lrZTV0YQ=="><i
                                            class="bi bi-instagram"></i></a>

                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('frontend/assets/images/vani.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Givani Arianti</h4>
                                <span>Technical Writer</span>
                                <div class="social">

                                    <a href="https://www.instagram.com/vanii_arn?igsh=MXdndzFlN3gwZG94dw=="><i
                                            class="bi bi-instagram"></i></a>

                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('frontend/assets/images/dapi.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Davi Ahmad Yani</h4>
                                <span>Tester</span>
                                <div class="social">

                                    <a href="https://www.instagram.com/daviahmdy_?igsh=M2RwbmYyeXU4ZnUz"><i
                                            class="bi bi-instagram"></i></a>

                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="#" class="logo d-flex align-items-center">
                        <span class="sitename">Porlempika</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p> Komp Sinar Limau Manis D13, Kel. Koto Luar, Kec. Pauh.</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+682170657217</span></p>
                        <p><strong>Email:</strong> <span>porlempikapadang@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Menu Utama</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Portfolio</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Team</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Program kami</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Pelatihan & Workshop</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Seminar & Diskusi</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Pengembangan SDM</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 footer-links text-end">
                    <img src="{{ asset('dashboard/assets/images/logoporlempika.png') }}" alt="Logo porlempika"
                        class="img-fluid" style="max-width: 100px;">
                    <img src="{{ asset('frontend/assets/images/koni.png') }}" alt="Logo koni" class="img-fluid"
                        style="max-width: 100px;">
                    <img src="{{ asset('frontend/assets/images/Logo_pnp.png') }}" alt="Logo pnp" class="img-fluid"
                        style="max-width: 100px;">

                </div>



            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Porlempika</strong> <span>Kota Padang</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="#">Kel 2</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.foto-hover');

            images.forEach(img => {
                let timer;

                img.addEventListener('mouseenter', () => {
                    timer = setTimeout(() => {
                        img.classList.add('enlarged');
                    }, 1000); // tunggu 1 detik
                });

                img.addEventListener('mouseleave', () => {
                    clearTimeout(timer); // batalkan jika belum 3 detik
                    img.classList.remove('enlarged'); // kecilkan kembali
                });
            });
        });
    </script>
    <script>
        (function() {
            if (!window.chatbase || window.chatbase("getState") !== "initialized") {
                window.chatbase = (...arguments) => {
                    if (!window.chatbase.q) {
                        window.chatbase.q = []
                    }
                    window.chatbase.q.push(arguments)
                };
                window.chatbase = new Proxy(window.chatbase, {
                    get(target, prop) {
                        if (prop === "q") {
                            return target.q
                        }
                        return (...args) => target(prop, ...args)
                    }
                })
            }
            const onLoad = function() {
                const script = document.createElement("script");
                script.src = "https://www.chatbase.co/embed.min.js";
                script.id = "sf2RVcB0jTngkTxpn7mQ_";
                script.domain = "www.chatbase.co";
                document.body.appendChild(script)
            };
            if (document.readyState === "complete") {
                onLoad()
            } else {
                window.addEventListener("load", onLoad)
            }
        })();
    </script>
    <script>
        $(document).ready(function() {
            // Default tab saat load pertama
            $('#features-tab-content').load("{{ route('ajax.jadwal') }}");

            // Saat tab diklik
            $('[data-bs-target]').on('click', function() {
                const targetId = $(this).data('bs-target');
                let url = '';

                switch (targetId) {
                    case '#features-tab-1':
                        url = "{{ route('ajax.jadwal') }}";
                        break;
                    case '#features-tab-2':
                        url = "{{ route('ajax.kategori') }}";
                        break;
                    case '#features-tab-3':
                        url = "{{ route('ajax.galeri') }}";
                        break;
                    case '#features-tab-4':
                        url = "{{ route('ajax.pengumuman') }}";
                        break;
                }

                $('#features-tab-content').load(url);
            });
        });
    </script>


</body>

</html>
