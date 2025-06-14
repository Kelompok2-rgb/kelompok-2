@extends('backend.layouts.app')
@section('title', 'Tambah Hasil Pertandingan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah Pertandingan ke Daftar Hasil</h2>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('backend.hasil_pertandingan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="pertandingan_id" class="form-label">Pilih Pertandingan</label>
                    <select name="pertandingan_id" id="pertandingan_id" class="form-control" required>
                        <option value="">-- Pilih Pertandingan --</option>
                        @foreach ($pertandingans as $pertandingan)
                            <option value="{{ $pertandingan->id }}">
                                {{ $pertandingan->nama_pertandingan }}
                            </option>
                        @endforeach
                    </select>
                    @error('pertandingan_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
@endsection
