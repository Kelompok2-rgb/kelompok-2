@extends('frontend.index')

@section('content')
    <div class="text-center mb-4">
        <h2>Anggota</h2>
    </div>

    @if ($anggotas->count())
        <div class="container">
            <div class="row">
                @foreach ($anggotas as $anggota)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $loop->iteration }}. {{ $anggota->nama }}</h5>

                                @if ($anggota->foto)
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" class="rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
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
        </div>
    @else
        <p class="text-center">Belum ada data anggota.</p>
    @endif
@endsection