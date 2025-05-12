@extends('')
@section('title', 'Daftar Pengumuman')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Daftar Pengumuman</h2>
    </div>

  
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Isi</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumumans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td>{{ $item->isi }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
