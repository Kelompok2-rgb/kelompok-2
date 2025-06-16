@extends('backend.layouts.app')

@section('title', 'Edit Kategori Pertandingan')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Kategori Pertandingan</h3>
                <hr>

                <form action="{{ route('backend.kategori_pertandingan.update', $kategoripertandingan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Kategori --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" 
                            class="form-control @error('nama') is-invalid @enderror" 
                            value="{{ old('nama', $kategoripertandingan->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Aturan --}}
                    <div class="mb-3">
                        <label for="aturan" class="form-label fw-bold">Aturan <span class="text-danger">*</span></label>
                        <input type="text" name="aturan" id="aturan" 
                            class="form-control @error('aturan') is-invalid @enderror" 
                            value="{{ old('aturan', $kategoripertandingan->aturan) }}" required>
                        @error('aturan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Batasan --}}
                    <div class="mb-3">
                        <label for="batasan" class="form-label fw-bold">Batasan <span class="text-danger">*</span></label>
                        <input type="text" name="batasan" id="batasan" 
                            class="form-control @error('batasan') is-invalid @enderror" 
                            value="{{ old('batasan', $kategoripertandingan->batasan) }}" required>
                        @error('batasan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.kategori_pertandingan.index') }}" class="btn btn-secondary">← Kembali</a>
                        <div>
                            <button type="reset" class="btn btn-warning me-2">Reset</button>
                            <button type="submit" class="btn btn-success">💾 Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
