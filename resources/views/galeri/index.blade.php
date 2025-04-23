@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Galeri PORLEMPIKA</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('galeri.create') }}" class="btn btn-primary">+ Tambah Galeri</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($galeris as $galeri)
            <div class="col">
                <div class="card shadow-sm rounded-4">
                    <img src="{{ asset('uploads/' . $galeri->gambar) }}" class="card-img-top" alt="gambar" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
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
</div>
@endsection
