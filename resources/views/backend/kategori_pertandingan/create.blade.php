@extends('layouts.appkategori_pertandingan')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Kategori Pertandingan
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

        {{-- Form Tambah Kategori Pertandingan --}}
        <form action="{{ route('kategori_pertandingan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="aturan" class="form-label">Aturan</label>
                <input type="text" class="form-control" id="aturan" name="aturan" value="{{ old('aturan') }}" required>
            </div>

            <div class="mb-3">
                <label for="batasan" class="form-label">Batasan</label>
                <input type="text" class="form-control" id="batasan" name="batasan" value="{{ old('batasan') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
