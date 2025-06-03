@extends('backend.layouts.main')
@section('title', 'Daftar Pengumuman')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Pengumuman</h2>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="{{ route('backend.pengumuman.create') }}" class="btn btn-primary"
            style="font-size: 17px; padding: 6px 12px; height: 38px; display: flex; align-items: center;">
            Tambah Pengumuman
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
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumumans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-size: 1.1rem; font-weight: 600;">{{ $item->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td style="text-align: left;">
                        <div style="max-height: 70px; overflow: hidden; position: relative;">
                            <div style="font-size: 1rem;">
                                {{ Str::limit($item->isi, 100) }}
                            </div>
                            <a href="javascript:void(0);"
   onclick="showDetailModal(`{{ addslashes($item->judul) }}`, `{{ $item->tanggal }}`, `{{ addslashes($item->isi) }}`)"
   style="position: absolute; bottom: 0; right: 0; font-size: 0.85rem; color: black;">
   Lihat Selengkapnya
</a>

                        </div>
                    </td>
                    <td>
                        <a href="{{ route('backend.pengumuman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('backend.pengumuman.destroy', $item->id) }}" method="POST"
                            style="display:inline;" onsubmit="return handleDeletePengumuman()">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data pengumuman</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Detail -->
    <div id="detailModal" class="modal" onclick="closeModal()">
        <div class="modal-content-wrapper" onclick="event.stopPropagation()">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3 id="modalJudul" class="modal-title text-white mt-3"></h3>
            <p id="modalTanggal" class="text-white mb-2"></p>
            <p id="modalIsi" class="modal-description text-white"></p>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.85);
            overflow-y: auto;
        }

        .modal-content-wrapper {
            margin: 50px auto;
            max-width: 70%;
            padding: 30px;
            background: #222;
            border-radius: 15px;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .modal-description {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .close {
            color: white;
            float: right;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <script>
        function handleDeletePengumuman() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin' && userRole !== 'penyelenggara') {
                alert('Hanya admin atau penyelenggara yang dapat menghapus.');
                return false;
            }
            return confirm('Yakin hapus?');
        }

        function exportTableToExcel() {
            const originalTable = document.querySelector('#tableExportArea');
            const cloneTable = originalTable.cloneNode(true);
            cloneTable.querySelectorAll('tr').forEach(row => {
                if (row.cells.length > 0) row.deleteCell(row.cells.length - 1);
            });
            const workbook = XLSX.utils.table_to_book(cloneTable, { sheet: "Pengumuman" });
            XLSX.writeFile(workbook, 'pengumuman.xlsx');
        }

        function showDetailModal(judul, tanggal, isi) {
            document.getElementById('modalJudul').innerText = judul;
            document.getElementById('modalTanggal').innerText = `Tanggal: ${tanggal}`;
            document.getElementById('modalIsi').innerText = isi;
            document.getElementById('detailModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('detailModal').style.display = 'none';
        }
    </script>

    <!-- SheetJS -->
    <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
@endsection
