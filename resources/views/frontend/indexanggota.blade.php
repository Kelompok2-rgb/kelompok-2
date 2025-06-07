@extends('frontend.index')

@section('content')
    <div class="container section-title mb-2" data-aos="fade-up">
        <h2>Porlempika</h2>
        <p>Anggota</p>
    </div>

    @if ($anggotas->count())
        <div class="container py-3">
            <div class="row gy-4">
                @foreach ($anggotas as $anggota)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member shadow rounded-4 overflow-hidden text-center p-3 bg-white h-100">
                            <div class="pic mb-3">
                                <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : asset('frontend/assets/images/default.jpg') }}"
                                    class="img-fluid rounded-5 border border-3" alt="Foto {{ $anggota->nama }}"
                                    style="width: 100%; height: 250px; object-fit: cover;">

                            </div>

                            <div class="member-info">
                                <h5 class="fw-bold text-primary">{{ $anggota->nama }}</h5>
                                <p class="text-muted mb-1">{{ $anggota->peran }}</p>
                                <p><strong>Nama Klub:</strong> {{ $anggota->klub }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{ $anggota->tgl_lahir }}</p>
                                <p><strong>Riwayat Prestasi:</strong><br>{{ $anggota->riwayat_prestasi }}</p>
                                <div class="social mt-3">
                                    @if ($anggota->kontak)
                                        <a href="https://wa.me/{{ $anggota->kontak }}" target="_blank"
                                            class="btn btn-success btn-sm rounded-pill">
                                            <i class="bi bi-whatsapp me-1"></i> Kontak
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Navigasi --}}
        <div class="d-flex justify-content-center gap-3 my-4">
            @if ($anggotas->onFirstPage())
                <button class="btn btn-outline-secondary" disabled>&larr; Sebelumnya</button>
            @else
                <a href="{{ $anggotas->previousPageUrl() }}" class="btn btn-outline-secondary">&larr; Sebelumnya</a>
            @endif

            @if ($anggotas->hasMorePages())
                <a href="{{ $anggotas->nextPageUrl() }}" class="btn btn-outline-primary">Selanjutnya &rarr;</a>
            @else
                <button class="btn btn-outline-primary" disabled>Selanjutnya &rarr;</button>
            @endif
        </div>
    @else
        <p class="text-center">Belum ada data anggota.</p>
    @endif
@endsection
