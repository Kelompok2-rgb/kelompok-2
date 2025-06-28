@extends('backend.layouts.app')

@section('title', 'Edit Contact')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Edit Contact</h3>
                <hr>

                {{-- Tampilkan pesan sukses jika ada --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('backend.contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                        <textarea name="address" id="address" rows="3"
                            class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $contact->address ?? '') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Telepon --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $contact->phone ?? '') }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $contact->email ?? '') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Latitude --}}
                    <div class="mb-3">
                        <label for="latitude" class="form-label fw-bold">Latitude</label>
                        <input type="text" name="latitude" id="latitude"
                            class="form-control @error('latitude') is-invalid @enderror"
                            value="{{ old('latitude', $contact->latitude ?? '') }}">
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Longitude --}}
                    <div class="mb-3">
                        <label for="longitude" class="form-label fw-bold">Longitude</label>
                        <input type="text" name="longitude" id="longitude"
                            class="form-control @error('longitude') is-invalid @enderror"
                            value="{{ old('longitude', $contact->longitude ?? '') }}">
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('backend.contact.index') }}" class="btn btn-secondary">← Kembali</a>
                        <div>
                            <button type="reset" class="btn btn-warning me-2">Reset</button>
                            <button type="submit" class="btn btn-success">💾 Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
