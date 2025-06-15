@extends('backend.layouts.app')
@section('title', 'Detail Hasil Pertandingan')

@section('content')
    <div class="container mt-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Detail Hasil Pertandingan</h2>
            <hr>
            <h5>{{ $hasilPertandingan->pertandingan->nama_pertandingan }}</h5>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('backend.detail_hasil_pertandingan.create', $hasilPertandingan->id) }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah Hasil Peserta
            </a>
            <a href="{{ route('backend.hasil_pertandingan.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>


        {{-- Tabel --}}
        <table class="table table-bordered table-striped text-center" id="example">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Lemparan 1</th>
                    <th>Lemparan 2</th>
                    <th>Lemparan 3</th>
                    <th>Lemparan 4</th>
                    <th>Lemparan 5</th>
                    <th>Skor</th>
                    <th>Rangking</th>
                    <th>Catatan Juri</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailHasil as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->nama }}</td>
                        <td>{{ $detail->lemparan1 }}</td>
                        <td>{{ $detail->lemparan2 }}</td>
                        <td>{{ $detail->lemparan3 }}</td>
                        <td>{{ $detail->lemparan4 }}</td>
                        <td>{{ $detail->lemparan5 }}</td>
                        <td>{{ $detail->skor }}</td>
                        <td>{{ $detail->rangking }}</td>
                        <td>{{ $detail->catatan_juri }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('backend.detail_hasil_pertandingan.edit', [$hasilPertandingan->id, $detail->id]) }}"
                                class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form
                                action="{{ route('backend.detail_hasil_pertandingan.destroy', [$hasilPertandingan->id, $detail->id]) }}"
                                method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
