@extends('backend.layouts.app')

@section('title', 'Edit Penyelenggara Event')

@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Edit Penyelenggara Event</h3>
            <hr>

            {{-- Tampilkan pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Edit --}}
            <form action="{{ route('backend.penyelenggara_event.update', $penyelenggara_event->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Penyelenggara --}}
                <div class="mb-3">
                    <label for="nama_penyelenggara_event" class="form-label fw-bold">Nama Penyelenggara</label>
                    <input type="text" id="nama_penyelenggara_event" name="nama_penyelenggara_event"
                        class="form-control @error('nama_penyelenggara_event') is-invalid @enderror"
                        value="{{ old('nama_penyelenggara_event', $penyelenggara_event->nama_penyelenggara_event) }}" required>
                    @error('nama_penyelenggara_event')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Event --}}
                <div class="mb-3">
                    <label for="nama_event" class="form-label fw-bold">Nama Event</label>
                    <input type="text" id="nama_event" name="nama_event"
                        class="form-control @error('nama_event') is-invalid @enderror"
                        value="{{ old('nama_event', $penyelenggara_event->nama_event) }}" required>
                    @error('nama_event')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal', $penyelenggara_event->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="mb-3">
                    <label for="lokasi" class="form-label fw-bold">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="form-control @error('lokasi') is-invalid @enderror"
                        value="{{ old('lokasi', $penyelenggara_event->lokasi) }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('backend.penyelenggara_event.index') }}" class="btn btn-secondary">← Kembali</a>
                    <div>
                        <button type="reset" class="btn btn-warning me-2">Reset</button>
                        <button type="submit" class="btn btn-success">💾 Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
