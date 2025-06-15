@extends('backend.layouts.main')
@section('title', 'Tambah Pertandingan')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-trophy me-2"></i> Tambah Pertandingan</h4>
                    <a href="{{ route('backend.pertandingan.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body">

                    {{-- Pesan sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Validasi error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Tambah Pertandingan --}}
                    <form action="{{ route('backend.pertandingan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            {{-- Nama Pertandingan --}}
                            <div class="col-md-6">
                                <label for="nama_pertandingan" class="form-label fw-semibold">Nama Pertandingan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pertandingan') is-invalid @enderror"
                                    id="nama_pertandingan" name="nama_pertandingan" value="{{ old('nama_pertandingan') }}"
                                    placeholder="Contoh: Kejuaraan Nasional Atletik 2025" required>
                                @error('nama_pertandingan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama Penyelenggara --}}
                            <div class="col-md-6">
                                <label for="nama_penyelenggara" class="form-label fw-semibold">Nama Penyelenggara <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_penyelenggara') is-invalid @enderror"
                                    id="nama_penyelenggara" name="nama_penyelenggara" value="{{ old('nama_penyelenggara') }}"
                                    placeholder="Contoh: KONI Indonesia" required>
                                @error('nama_penyelenggara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="fas fa-rotate-left me-1"></i> Reset
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
