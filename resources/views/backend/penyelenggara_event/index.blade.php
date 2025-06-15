@extends('backend.layouts.main')
@section('title', 'Halaman Penyelenggara Event')
@section('navEvent', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Penyelenggara Event</h2>
        <hr>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.penyelenggara_event.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;"><i class="fas fa-plus me-1"></i>
            Tambah Penyelenggara
        </a>

    </div>

    <table id="example" class="table table-bordered table-striped mt-3 text-center tableExportArea">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyelenggara</th>
                <th>Kontak</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($penyelenggara_events as $penyelenggara)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penyelenggara->nama_penyelenggara_event }}</td>
                    <td>{{ $penyelenggara->kontak }}</td>
                    <td>
                        <a href="{{ route('backend.penyelenggara_event.edit', $penyelenggara->id) }}"
                            class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('backend.penyelenggara_event.destroy', $penyelenggara->id) }}" method="POST"
                            style="display:inline;" onsubmit="return handleDeletePenyelenggara()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                        </form>



                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function handleDeletePenyelenggara() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin') {
                alert('Hanya admin yang dapat menghapus.');
                return false;
            }
            return confirm('Yakin ingin menghapus?');
        }
    </script>


@endsection
