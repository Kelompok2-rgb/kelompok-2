@extends('backend.layouts.app')

@section('title', 'Tambah Jadwal Pertandingan')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Jadwal Pertandingan</h2> 
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

            <div class="row">
        <div class="mb-3">
    <label for="nama_pertandingan" class="form-label">Nama Pertandingan</label>
    <input type="text" class="form-control" id="nama_pertandingan" name="nama_pertandingan" 
           value="{{ old('nama_pertandingan') }}" required>
    @error('nama_pertandingan') 
        <small class="text-danger">{{ $message }}</small> 
    @enderror
            </div>

           

                

                <div class="col-md-6 mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" 
                           value="{{ old('lokasi') }}" required>
                    @error('lokasi') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" 
                           value="{{ old('tanggal') }}" required>
                    @error('tanggal') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" 
                           value="{{ old('waktu') }}" required>
                    @error('waktu') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="{{ route('backend.jadwal_pertandingan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Style untuk date picker dan time picker */
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        background-color: white;
        padding: 5px;
        border-radius: 4px;
    }
</style>
@endsection