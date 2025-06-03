@extends('backend.layouts.main')
@section('title', 'Halaman Juri')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>Juri</h2>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div style="display: flex; align-items: center; gap: 10px;">
    <a href="{{ route('backend.juri.create') }}" class="btn btn-primary"
        style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
        Tambah Juri
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
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Sertifikat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($juris as $juri)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $juri->nama }}</td>
                <td>{{ $juri->tanggal_lahir }}</td>
                <td>
                    @if ($juri->sertifikat)
                        <a href="{{ asset('storage/' . $juri->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('backend.juri.edit', $juri->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('backend.juri.destroy', $juri->id) }}" method="POST" class="d-inline"
                        onsubmit="return handleDeleteJuri()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data juri</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
    function handleDeleteJuri() {
        const userRole = @json(Auth::user()->role);
        if (userRole !== 'admin') {
            alert('Hanya admin yang dapat menghapus');
            return false;
        }
        return confirm('Yakin ingin menghapus?');
    }

    function exportTableToExcel() {
        const originalTable = document.querySelector('#tableExportArea');
        const cloneTable = originalTable.cloneNode(true);
        cloneTable.querySelectorAll('tr').forEach(row => {
            if (row.cells.length > 0) {
                row.deleteCell(row.cells.length - 1);
            }
        });
        const workbook = XLSX.utils.table_to_book(cloneTable, { sheet: "Juri" });
        XLSX.writeFile(workbook, 'juri.xlsx');
    }
</script>

<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
@endsection
