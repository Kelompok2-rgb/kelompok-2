@extends('backend.layouts.app')

@section('title', 'Tambah Atlet')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Atlet</h2> 
    </div>
    <div class="card-body">
        <form action="{{ route('backend.atlet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <textarea class="form-control" id="prestasi" name="prestasi">{{ old('prestasi') }}</textarea>
                @error('prestasi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="club_id" class="form-label">Klub (Opsional)</label>
                <select name="club_id" id="club_id" class="form-control" onchange="toggleClubInput(this)">
                    <option value="">-- Pilih Klub (boleh dikosongkan) --</option>
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>
                            {{ $club->nama }}
                        </option>
                    @endforeach
                </select>
                @error('club_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>

<script>
    function toggleClubInput(select) {
        const container = document.getElementById('custom-club-container');
        if (select.value === 'custom') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
            document.getElementById('new_club').value = '';
        }
    }

    // Tetap tampilkan input jika sebelumnya user memilih "custom"
    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('club_id').value === 'custom') {
            document.getElementById('custom-club-container').style.display = 'block';
        }
    });
</script>
@endsection
