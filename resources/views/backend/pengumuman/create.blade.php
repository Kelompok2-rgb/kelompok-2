@extends('backend.layouts.app') <!-- Sesuaikan dengan layout utama kamu -->

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-light">
            <h4 class="mb-0">Tambah Pengumuman</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <form action="{{ route('backend.pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" id="isi" rows="4" placeholder="Masukkan isi pengumuman" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('backend.pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
