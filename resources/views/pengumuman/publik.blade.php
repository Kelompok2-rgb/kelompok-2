@extends('layouts.app')

@section('content')
    <h1>Pengumuman Terbaru</h1>

    @foreach ($pengumumans as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <h6 class="card-subtitle text-muted">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                </h6>
                <p class="card-text">{{ $item->isi }}</p>
            </div>
        </div>
    @endforeach
@endsection
