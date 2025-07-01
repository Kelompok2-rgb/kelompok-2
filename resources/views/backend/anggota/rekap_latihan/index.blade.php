@extends('backend.layouts.app')

@section('title', 'Rekap Latihan')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Rekap Latihan: {{ $anggota->nama }}</h2>

        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Tambah Rekap --}}
        <div class="card mb-4">
            <div class="card-header bg-light">Tambah Rekap Latihan</div>
            <div class="card-body">
                <form action="{{ route('backend.rekap_latihan.store', $anggota->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="jarak" class="form-label">Jarak (m)</label>
                            <select name="jarak" class="form-select" required>
                                <option value="" disabled selected>Pilih jarak</option>
                                @for ($i = 3; $i <= 9; $i++)
                                    <option value="{{ $i }}">{{ $i }} meter</option>
                                @endfor
                            </select>
                        </div>

                        @for ($i = 1; $i <= 3; $i++)
                            <div class="col-md-2 mb-2">
                                <label for="lemparan{{ $i }}" class="form-label">Lemparan
                                    {{ $i }}</label>
                                <input type="number" name="lemparan{{ $i }}" step="0.01"
                                    class="form-control">
                            </div>
                        @endfor
                        <div class="col-md-12 mt-3">

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar Rekap --}}
        <div class="card">
            <div class="card-header bg-light">Daftar Rekap Latihan</div>
            <div class="card-body">
                @if ($rekap->count())
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jarak(m)</th>
                                <th>L1</th>
                                <th>L2</th>
                                <th>L3</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekap as $item)
                                <tr>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->jarak }}</td>
                                    <td>{{ $item->lemparan1 }}</td>
                                    <td>{{ $item->lemparan2 }}</td>
                                    <td>{{ $item->lemparan3 }}</td>

                                    <td>
                                        <form action="{{ route('backend.rekap_latihan.destroy', $item->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus rekap ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    <div class="alert alert-warning">Belum ada data rekap latihan.</div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-light">
                <a href="{{ route('backend.anggota.index') }}" class="btn btn-secondary">← Kembali ke Daftar Anggota</a>
            </div>
        </div>
    </div>
@endsection
