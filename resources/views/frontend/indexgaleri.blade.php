@extends('')
@section('title','Halaman Galeri')
@section('navMhs', 'active')

@section('content')
<div class="text-center mb-4">
    <h2>GALERI</h2>
</div>


    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($galeris as $galeri)
            <div class="col">
                <div class="card shadow-sm rounded-4">
                    <img src="{{ asset('uploads/' . $galeri->gambar) }}" class="card-img-top" alt="gambar" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                       
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada data galeri.
                </div>
            </div>
        @endforelse
    </div>
@endsection
