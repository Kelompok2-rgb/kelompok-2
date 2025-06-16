@extends('backend.layouts.app')

@section('title', 'Edit Pertandingan')

@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Edit Pertandingan</h3>
            <hr>

            {{-- Tampilkan pesan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('backend.pertandingan.update', $pertandingan->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Pertandingan --}}
                <div class="mb-3">
                    <label for="nama_pertandingan" class="form-label fw-bold">
                        Nama Pertandingan <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="nama_pertandingan" name="nama_pertandingan"
                        class="form-control @error('nama_pertandingan') is-invalid @enderror"
                        value="{{ old('nama_pertandingan', $pertandingan->nama_pertandingan) }}" required>
                    @error('nama_pertandingan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Penyelenggara --}}
                <div class="mb-3">
                    <label for="penyelenggara_event_id" class="form-label fw-bold">
                        Nama Penyelenggara <span class="text-danger">*</span>
                    </label>
                    <select id="penyelenggara_event_id" name="penyelenggara_event_id"
                        class="form-select @error('penyelenggara_event_id') is-invalid @enderror" required>
                        <option value="" disabled>-- Pilih Penyelenggara --</option>
                        @foreach ($penyelenggaras as $penyelenggara)
                            <option value="{{ $penyelenggara->id }}"
                                {{ old('penyelenggara_event_id', $pertandingan->penyelenggara_event_id) == $penyelenggara->id ? 'selected' : '' }}>
                                {{ $penyelenggara->nama_penyelenggara_event }}
                            </option>
                        @endforeach
                    </select>
                    @error('penyelenggara_event_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('backend.pertandingan.index') }}" class="btn btn-secondary">← Kembali</a>
                    <div>
                        <button type="reset" class="btn btn-warning me-2">Reset</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
