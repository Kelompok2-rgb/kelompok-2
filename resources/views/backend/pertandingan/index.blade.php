@extends('backend.layouts.main')
@section('title', 'Halaman Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Pertandingan</h2>
        <hr>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('backend.pertandingan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Pertandingan
        </a>
    </div>

    <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped text-center tableExportArea">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pertandingan</th>
                    <th>Nama Penyelenggara</th>
                    <th>Peserta</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertandingans as $pertandingan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pertandingan->nama_pertandingan }}</td>
                        <td>
                            {{ $pertandingan->penyelenggaraEvent->nama_penyelenggara_event ?? '-' }}
                        </td>
                        <td>
                            <a href="{{ route('backend.peserta.index', $pertandingan->id) }}" class="btn btn-secondary btn-sm">
                                Kelola Peserta
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('backend.pertandingan.edit', $pertandingan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('backend.pertandingan.destroy', $pertandingan->id) }}" method="POST"
                                  style="display:inline;" onsubmit="return handleDeletePertandingan();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function handleDeletePertandingan() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin' && userRole !== 'penyelenggara') {
                alert('Hanya admin dan penyelenggara yang dapat menghapus.');
                return false;
            }
            return confirm('Yakin ingin menghapus pertandingan ini?');
        }
    </script>
@endsection
