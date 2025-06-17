@extends('backend.layouts.main')
@section('title', 'Output Data Atlet')

@section('content')
    <div class="text-center mb-4">
        <h2>Cetak Data Atlet</h2>
        <hr>
    </div>

    <div class="row">
        @forelse ($atlets as $atlet)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($atlet->foto)
                        <img src="{{ asset('storage/' . $atlet->foto) }}"
                             alt="Foto {{ $atlet->nama }}"
                             class="card-img-top"
                             style="height: 200px; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white"
                             style="height: 200px;">
                            Tidak Ada Foto
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $atlet->nama }}</h5>
                        <p class="mb-1"><strong>Klub:</strong> {{ $atlet->club->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Prestasi:</strong> {{ $atlet->prestasi ?: '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Belum ada data atlet.</p>
            </div>
        @endforelse
    </div>
@endsection
