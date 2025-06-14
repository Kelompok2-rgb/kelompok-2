@extends('backend.layouts.app')

@section('title', 'Peserta Pertandingan')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Peserta Pertandingan: {{ $pertandingan->nama_pertandingan }}</h2>

        @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

        @if (session('error'))
        <div style="background-color: #d4edda; color: #ff0000; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('error') }}
        </div>
        @endif

        {{-- Form Tambah Peserta --}}
        <div class="card mb-4">
            <div class="card-header bg-light">Tambah Peserta</div>
            <div class="card-body">
                <form action="{{ route('backend.peserta.store', $pertandingan->id) }}" method="POST">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label for="atlet_id" class="form-label">Pilih Atlet</label>
                            <select name="atlet_id" class="form-select" required>
                                <option value="">-- Pilih Atlet --</option>
                                @foreach ($semuaAtlet as $atlet)
                                    @if (!$pertandingan->atlets->contains($atlet->id))
                                        <option value="{{ $atlet->id }}">{{ $atlet->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar Peserta --}}
        <div class="card">
            <div class="card-header bg-light">Daftar Peserta</div>
            <div class="card-body">
                @if ($pertandingan->atlets->count())
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama Atlet</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pertandingan->atlets as $peserta)
                                <tr>
                                    <td>{{ $peserta->nama }}</td>
                                    <td>
                                        <form
                                            action="{{ route('backend.peserta.destroy', [$pertandingan->id, $peserta->id]) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus peserta ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">Belum ada peserta ditambahkan.</div>
                @endif
            </div>
        </div>
         <div class="card">
            <div class="card-header bg-light"><a href="{{ route('backend.pertandingan.index') }}" class="btn btn-secondary">← Kembali ke Daftar Pertandingan</a></div>
              </div>
        </div>
    </div>
@endsection
