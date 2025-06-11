@extends('frontend.index')

@section('content')
<section id="galeri">
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
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $galeri->judul }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($galeri->deskripsi, 100) }}</p>
                            <a href="javascript:void(0);" onclick="showGaleriModal(`{{ addslashes($galeri->judul) }}`, `{{ addslashes($galeri->deskripsi) }}`, `{{ asset('uploads/' . $galeri->gambar) }}`)" class="text-decoration-underline mt-auto" style="color: black;">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning text-center py-4">
                        <i class="bi bi-exclamation-circle me-2"></i> Belum ada data galeri
                    </div>
                </div>
            @endforelse
        </div>
    </div>

<!-- Modal Galeri -->
<div id="galeriModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); z-index:1050;">
    <div class="modal-dialog modal-lg mt-5 mx-auto" style="background:white; border-radius:1rem; padding:2rem; position:relative;" onclick="event.stopPropagation();">
        <!-- Tombol Close -->
        <button type="button" id="closeModalBtn"
                style="position:absolute; top:1rem; right:1rem; background:transparent; border:none; font-size:2rem; cursor:pointer;">&times;
        </button>
        <h3 id="modalGaleriJudul" class="mb-3"></h3>
        <img id="modalGaleriImg" src="" class="img-fluid rounded mb-3" />
        <p id="modalGaleriDeskripsi"></p>
    </div>
</div>

<script>
    function showGaleriModal(judul, deskripsi, gambar) {
        document.getElementById('modalGaleriJudul').textContent = judul;
        document.getElementById('modalGaleriDeskripsi').textContent = deskripsi;
        document.getElementById('modalGaleriImg').src = gambar;
        document.getElementById('galeriModal').style.display = 'block';
    }

    // Tutup modal saat klik di luar isi modal
    document.getElementById('galeriModal').addEventListener('click', function () {
        this.style.display = 'none';
    });

    // Tombol close juga bisa digunakan
    document.getElementById('closeModalBtn').addEventListener('click', function () {
        document.getElementById('galeriModal').style.display = 'none';
    });
</script>

</section>
@endsection
