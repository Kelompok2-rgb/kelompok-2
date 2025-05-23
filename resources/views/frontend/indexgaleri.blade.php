@extends('frontend.index')

@section('content')
            <div class="container py-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">GALERI PORLEMPIKA</h2>
                    <hr class="w-25 mx-auto border-primary">
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @forelse ($galeris as $galeri)
                        <div class="col" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm rounded-4 h-100">
                                <img src="{{ asset('uploads/' . $galeri->gambar) }}" 
                                     class="card-img-top" 
                                     alt="{{ $galeri->judul }}"
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $galeri->judul }}</h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center py-4">
                                <i class="bi bi-exclamation-circle me-2"></i> Belum ada data galeri
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
@endsection