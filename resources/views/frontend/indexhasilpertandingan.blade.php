@extends('')
@section('title','Halaman Hasil Pertandingan')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>DATA HASIL PERTANDINGAN</h2>
</div>


<table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Skor</th>
            <th>Rangking</th>
            <th>Catatan Juri</th>
            <th>Dibuat</th>
            <th>Diperbarui</th>
            
        </tr>
    </thead>
   <tbody>
    @forelse ($hasilPertandingans as $index => $hasil)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td class="text-center">{{ $hasil->skor }}</td>
            <td class="text-center">{{ $hasil->rangking }}</td>
            <td>{{ $hasil->catatan_juri }}</td>
            <td class="text-center">{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
            <td class="text-center">{{ $hasil->updated_at->format('d-m-Y H:i') }}</td>
           
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data hasil pertandingan</td>
        </tr>
    @endforelse
</tbody>

</table>
@endsection
