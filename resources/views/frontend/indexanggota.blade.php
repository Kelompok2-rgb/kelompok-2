@extends('frontend.index')

@section('content')
    <div class="text-center mb-4">
        <h2>Anggota</h2>
    </div>

    @if ($anggotas->count())
        <div class="container">
            {{-- Grid Card Anggota --}}
            <div class="row justify-content-center align-items-stretch">
                @foreach ($anggotas as $anggota)
                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">
                                    {{ $loop->iteration + ($anggotas->currentPage() - 1) * $anggotas->perPage() }}. {{ $anggota->nama }}
                                </h5>

                                @if ($anggota->foto)
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto"
                                         class="rounded mb-3"
                                         style="width: 100%; height: 200px; object-fit: cover;">
                                @else
                                    <div class="bg-dark text-white rounded d-flex justify-content-center align-items-center mb-3"
                                         style="width: 100%; height: 200px;">
                                        <strong>Foto</strong>
                                    </div>
                                @endif

                                <div class="text-start">
                                    <p><strong>Klub:</strong> {{ $anggota->klub }}</p>
                                    <p><strong>Tanggal Lahir:</strong> {{ $anggota->tgl_lahir }}</p>
                                    <p><strong>Peran:</strong> {{ $anggota->peran }}</p>
                                    <p><strong>Nomor WA:</strong> {{ $anggota->kontak }}</p>
                                </div>

                                <div class="text-start mt-2">
                                    <p class="fw-bold">Riwayat Prestasi:</p>
                                    <p>{{ $anggota->riwayat_prestasi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol Navigasi --}}
            <div class="d-flex justify-content-center gap-3 my-4">
                {{-- Tombol Sebelumnya --}}
                @if ($anggotas->onFirstPage())
                    <button class="btn btn-outline-secondary" disabled>&larr; Sebelumnya</button>
                @else
                    <a href="{{ $anggotas->previousPageUrl() }}" class="btn btn-outline-secondary">&larr; Sebelumnya</a>
                @endif

                {{-- Tombol Selanjutnya --}}
                @if ($anggotas->hasMorePages())
                    <a href="{{ $anggotas->nextPageUrl() }}" class="btn btn-outline-primary">Selanjutnya &rarr;</a>
                @else
                    <button class="btn btn-outline-primary" disabled>Selanjutnya &rarr;</button>
                @endif
            </div>
        </div>
    @else
        <p class="text-center">Belum ada data anggota.</p>
    @endif
@endsection
