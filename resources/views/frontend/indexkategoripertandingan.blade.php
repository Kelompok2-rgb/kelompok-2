@extends('')

@section('title', 'Kategori Pertandingan')

@section('content')
  <div class="text-center mb-4">
      <h2>PORLEMPIKA</h2>
  </div>

  

  <table class="table table-bordered table-striped">
      <thead class="table-dark text-center">
          <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Aturan</th>
              <th>Batasan</th>
              
          </tr>
      </thead>
      <tbody>
          @forelse ($kategoripertandingans as $index => $kategori)
              <tr>
                  <td class="text-center">{{ $index + 1 }}</td>
                  <td>{{ $kategori->nama }}</td>
                  <td>{{ $kategori->aturan }}</td>
                  <td>{{ $kategori->batasan }}</td>
                 
              </tr>
          @empty
              <tr>
                  <td colspan="5" class="text-center">Belum ada kategori pertandingan</td>
              </tr>
          @endforelse
      </tbody>
  </table>
@endsection
