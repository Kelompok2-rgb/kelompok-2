@extends('backend.layouts.app')

@section('title', 'Detail Hasil Pertandingan')

@section('content')
    <div class="text-center mb-4">
        <h2>Detail Hasil Pertandingan</h2>
        <hr>
        <h5>{{ $hasilPertandingan->pertandingan->nama_pertandingan }}</h5>
    </div>

    {{-- Alert jika sukses --}}
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Aksi --}}
    <div class="d-flex justify-content-start gap-2 mb-3">
        <a href="{{ route('backend.detail_hasil_pertandingan.create', $hasilPertandingan->id) }}" class="btn btn-primary">
            Tambah Hasil Peserta
        </a>
        <a href="{{ route('backend.hasil_pertandingan.index') }}" class="btn btn-secondary">
            ← Kembali ke Daftar Hasil Pertandingan
        </a>
    </div>

    {{-- Tabel Detail Hasil --}}
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
                    <td>
                        <a href="{{ route('backend.detail_hasil_pertandingan.edit', [$hasilPertandingan->id, $detail->id]) }}"
                            class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('backend.detail_hasil_pertandingan.destroy', [$hasilPertandingan->id, $detail->id]) }}"
                            method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
