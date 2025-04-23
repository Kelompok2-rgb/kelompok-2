@extends('layouts.appclub')

@section('content')
    <div class="container mt-4">
        <h2>Edit Club</h2>
        <form action="{{ route('club.update', $club->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nama" class="form-label">Nama Club</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $club->nama ?? '') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                    value="{{ old('lokasi', $club->lokasi ?? '') }}">
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $club->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
