@extends('backend.layouts.main')
@section('title', 'Halaman Penyelenggara Event')
@section('navEvent', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Penyelenggara Event</h2>
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

    <table id="tableExportArea" class="table table-bordered table-striped mt-3 text-center">
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
                    <a href="{{ route('backend.penyelenggara_event.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('backend.penyelenggara_event.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- SheetJS untuk Export Excel -->
    <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportTableToExcel() {
            const originalTable = document.querySelector('#tableExportArea');
            const cloneTable = originalTable.cloneNode(true);

            cloneTable.querySelectorAll('tr').forEach(row => {
                if (row.cells.length > 0) {
                    row.deleteCell(row.cells.length - 1); // hapus kolom aksi
                }
            });

            const workbook = XLSX.utils.table_to_book(cloneTable, { sheet: "PenyelenggaraEvent" });
            XLSX.writeFile(workbook, 'penyelenggara_event.xlsx');
        }
    </script>
@endsection
