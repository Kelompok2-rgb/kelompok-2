@extends('backend.layouts.main')

@section('title', 'Tambah Atlet')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow border-0">
                    <div
                        class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i> Tambah Atlet</h4>
                        <a href="{{ route('backend.atlet.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body">

                        {{-- Alert sukses --}}
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('backend.atlet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label fw-semibold">Nama <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                        placeholder="Masukkan nama atlet" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="foto" class="form-label fw-semibold">Foto  <span class="text-danger">*</span></label>
                                    <input type="file" id="foto" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="prestasi" class="form-label fw-semibold">Prestasi</label>
                                    <textarea id="prestasi" name="prestasi" class="form-control @error('prestasi') is-invalid @enderror" rows="3"
                                        placeholder="Contoh: Juara 1 Kejurda 2023" style="--bs-placeholder-color: #6c757d;">{{ old('prestasi') }}</textarea>


                                    @error('prestasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="club_id" class="form-label fw-semibold">Klub (Opsional)</label>
                                    <select id="club_id" name="club_id"
                                        class="form-select @error('club_id') is-invalid @enderror">
                                        <option value="">-- Pilih Klub --</option>
                                        @foreach ($clubs as $club)
                                            <option value="{{ $club->id }}"
                                                {{ old('club_id') == $club->id ? 'selected' : '' }}>
                                                {{ $club->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('club_id')
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
