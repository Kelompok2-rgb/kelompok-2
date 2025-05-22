<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body class="index-page">


    <main class="main">
        <section class="section dark-background py-5">
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">DAFTAR ANGGOTA PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th width="15%">Foto</th>
                                <th>Tanggal Lahir</th>
                                <th>Peran</th>
                                <th>Riwayat Prestasi</th>
                                <th>Kontak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anggotas as $anggota)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td class="text-center">
                                    @if($anggota->foto)
                                        <img src="{{ asset('storage/'.$anggota->foto) }}" 
                                             alt="{{ $anggota->nama }}" 
                                             class="img-thumbnail"
                                             style="max-height: 80px">
                                    @else
                                        <span class="badge bg-secondary">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $anggota->tgl_lahir }}</td>
                                <td>{{ $anggota->peran }}</td>
                                <td>{{ $anggota->riwayat_prestasi }}</td>
                                <td>{{ $anggota->kontak }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle me-2"></i> Data anggota belum tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

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