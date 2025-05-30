@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Jadwal Pertanddingan</h2> 
    </div>
    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        
        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Jadwal Pertandingan --}}
        <form action="{{ route('backend.jadwal_pertandingan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
            </div>

            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="{{ old('waktu') }}" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
