@extends('backend.layouts.app')

@section('title', 'Tambah Jadwal Pertandingan')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Jadwal Pertandingan</h2> 
    </div>
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Jadwal Pertandingan --}}
        <form action="{{ route('backend.jadwal_pertandingan.store') }}" method="POST">
            @csrf

            <!-- Pilih Pertandingan -->
            <div class="mb-3">
                <label for="pertandingan_id" class="form-label">Nama Pertandingan</label>
                <select id="pertandingan_id" name="pertandingan_id" class="form-select" required>
                    <option value="">-- Pilih Pertandingan --</option>
                    @foreach ($pertandingans as $p)
                        <option value="{{ $p->id }}"
                                data-tanggal="{{ $p->tanggal }}"
                                data-lokasi="{{ $p->lokasi }}">
                            {{ $p->nama_pertandingan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal (auto) -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="text" id="tanggal" name="tanggal" class="form-control" readonly>
            </div>

            <!-- Lokasi (auto) -->
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" readonly>
            </div>

            <!-- Waktu (manual) -->
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" id="waktu" name="waktu" class="form-control" required>
            </div>

            <!-- Deskripsi (manual) -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>

<style>
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        background-color: white;
        padding: 5px;
        border-radius: 4px;
    }
</style>

<script>
    document.getElementById('pertandingan_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const tanggal = selectedOption.getAttribute('data-tanggal');
        const lokasi = selectedOption.getAttribute('data-lokasi');

        document.getElementById('tanggal').value = tanggal || '';
        document.getElementById('lokasi').value = lokasi || '';
    });
</script>
@endsection
