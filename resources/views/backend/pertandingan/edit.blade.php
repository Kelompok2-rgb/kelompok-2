@extends('layouts.apppertandingan')

@section('content')
    <div class="container mt-4">
        <h2>Edit Pertandingan</h2>
        <form action="{{ route('pertandingan.update', $pertandingan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('lokasi', $pertandingan->lokasi) }}">
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                    value="{{ old('tanggal', $pertandingan->tanggal) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
