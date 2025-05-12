@extends('')
@section('title','Halaman Club')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>DAFTAR CLUB</h2>
    </div>
    
 
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama Club</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            
        </tr>
        @foreach ($clubs as $club)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $club->nama }}</td>
                <td>{{ $club->lokasi }}</td>
                <td>{{ $club->deskripsi }}</td>
                
            </tr>
        @endforeach
    </table>
@endsection
