@extends('layouts.main')

@section('title', 'Daftar Pengumuman')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pengumuman</h2>
        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
    </div>

    @foreach ($pengumumans as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <h6 class="card-subtitle text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</h6>
                <p class="card-text">{{ $item->isi }}</p>
                <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
