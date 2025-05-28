@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Penyelenggara Event</h2>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('backend.penyelenggara_event.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_penyelenggara_event" class="form-label">Nama Penyelenggara</label>
                    <input type="text" class="form-control @error('nama_penyelenggara_event') is-invalid @enderror"
                           name="nama_penyelenggara_event" id="nama_penyelenggara_event" value="{{ old('nama_penyelenggara_event') }}">
                    @error('nama_penyelenggara_event')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_event" class="form-label">Nama Event</label>
                    <input type="text" class="form-control @error('nama_event') is-invalid @enderror"
                           name="nama_event" id="nama_event" value="{{ old('nama_event') }}">
                    @error('nama_event')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                           name="lokasi" id="lokasi" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
@endsection
