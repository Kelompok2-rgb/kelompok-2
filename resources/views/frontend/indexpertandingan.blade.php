@extends('frontend.index')
@section('content')

    <div class="text-center mb-4">
        <h2>Pertandingan</h2>
    </div>

    </div>
    <table id="tableExportArea" class="table table-bordered table-striped mt-3 text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Nama Pertandingan</th>
                <th>Nama Penyelenggara</th>
                <th>Tanggal</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($pertandingans as $pertandingan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pertandingan->lokasi }}</td>
                    <td>{{ $pertandingan->nama_pertandingan }}</td>
                    <td>{{ $pertandingan->nama_penyelenggara }}</td>
                    <td>{{ $pertandingan->tanggal }}</td>
                   
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data pertandingan</td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <!-- SheetJS untuk Export Excel -->
  
@endsection
