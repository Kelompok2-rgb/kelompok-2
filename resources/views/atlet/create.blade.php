@extends('layouts.appatlet')

@section('title', 'Tambah Atlet')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Atlet
    </div>
    <div class="card-body">
        <form action="{{ route('atlet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <textarea class="form-control" id="prestasi" name="prestasi">{{ old('prestasi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="statistik_pertandingan" class="form-label">Statistik Pertandingan</label>
                <textarea class="form-control" id="statistik_pertandingan" name="statistik_pertandingan">{{ old('statistik_pertandingan') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="training_record" class="form-label">Training Record</label>
                <textarea class="form-control" id="training_record" name="training_record">{{ old('training_record') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
