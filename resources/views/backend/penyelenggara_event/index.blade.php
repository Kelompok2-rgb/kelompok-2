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
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Event
        </a>

        <button onclick="exportTableToExcel()" class="btn btn-success" title="Ekspor Excel"
            style="font-size: 24px; padding: 6px; height: 38px; width: 38px; display: flex; align-items: center; justify-content: center;">
            <i class="fa-solid fa-file-excel"></i>
        </button>
    </div>

    <table id="example" class="table table-bordered table-striped mt-3 text-center tableExportArea">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyelenggara Event</th>
                <th>Nama Event</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyelenggara_events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->nama_penyelenggara_event }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->tanggal }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>
                        <a href="{{ route('backend.penyelenggara_event.edit', $event->id) }}"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('backend.penyelenggara_event.destroy', $event->id) }}" method="POST"
                            style="display:inline;" onsubmit="return handleDeletePenyelenggara()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
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
