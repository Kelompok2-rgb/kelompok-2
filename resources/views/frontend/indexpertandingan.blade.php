@extends('')
@section('title','Halaman Pertandingan')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Daftar Pertandingan</h2>
    </div>


    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($pertandingans as $pertandingan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pertandingan->lokasi }}</td>
                <td>{{ $pertandingan->tanggal }}</td>
            </tr>
        @endforeach
    </table>
@endsection
