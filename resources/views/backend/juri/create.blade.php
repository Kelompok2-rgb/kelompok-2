@extends('layouts.appjuri')

@section('title', 'Tambah Juri')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Juri
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <form action="{{ route('juri.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="pengalaman" class="form-label">Pengalaman</label>
                <textarea class="form-control" id="pengalaman" name="pengalaman" required>{{ old('pengalaman') }}</textarea>
                @error('pengalaman') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 8d7f5a308a18df9365fa9cae52e5f9e683bbb02f
