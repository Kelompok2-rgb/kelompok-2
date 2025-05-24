@extends('backend.layouts.main')
@section('title','Halaman Galeri')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>Galeri</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('backend.galeri.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($galeris as $galeri)
        <div class="col">
            <div class="card shadow-sm rounded-4">
                <img src="{{ asset('uploads/' . $galeri->gambar) }}" class="card-img-top" alt="gambar" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text text-white">{{ $galeri->deskripsi }}</p> {{-- Deskripsi ditampilkan di sini --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('backend.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('backend.galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                Belum ada data galeri.
            </div>
        </div>
    @endforelse
</div>
@endsection
