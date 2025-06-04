@extends('frontend.index')

@section('content')
    <div class="text-center mb-4">
        <h2>Klub</h2>
    </div>



    <table id="tableExportArea" class="table table-bordered table-striped mt-3 text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Klub</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($clubs as $club)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $club->nama }}</td>
                    <td>{{ $club->lokasi }}</td>
                    <td>{{ $club->deskripsi }}</td>
                 
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data klub belum tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- SheetJS untuk Export Excel -->
 
@endsection
