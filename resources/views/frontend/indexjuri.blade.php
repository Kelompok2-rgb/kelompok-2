@extends('')
@section('title','Halaman Juri')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>DATA JURI</h2>
</div>


    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pengalaman</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($juris as $juri)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $juri->nama }}</td>
                    <td>{{ $juri->pengalaman }}</td>
                   
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data juri</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
