@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Pertandingan</h2> 
        </div>
        <div class="card-body">
            
            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('backend.pertandingan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                        value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_pertandingan" class="form-label">Nama Pertandingan</label>
                    <input type="text" class="form-control @error('nama_pertandingan') is-invalid @enderror" id="nama_pertandingan" name="nama_pertandingan"
                        value="{{ old('nama_pertandingan') }}">
                    @error('nama_pertandingan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_penyelenggara" class="form-label">Nama Pertandingan</label>
                    <input type="text" class="form-control @error('nama_penyelenggara') is-invalid @enderror" id="nama_penyelenggara" name="nama_penyelenggara"
                        value="{{ old('nama_penyelenggara') }}">
                    @error('nama_penyelenggara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
