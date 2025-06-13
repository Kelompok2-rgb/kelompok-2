@extends('frontend.index')

@section('content')
<section id="pengumuman">
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">DAFTAR PENGUMUMAN PORLEMPIKA</h2>
            <hr class="w-25 mx-auto border-primary">
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse ($pengumumans as $item)
                <div class="col">
                    <div class="card shadow-sm rounded-4 h-100 p-3">
                        <h5 class="fw-bold">{{ $item->judul }}</h5>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}</p>
                        <a href="javascript:void(0);" 
                           onclick="showPengumumanModal(@json($item->judul), @json(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')), @json($item->isi))" 
                           class="text-decoration-underline text-dark">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center py-4">
                        <i class="bi bi-exclamation-circle me-2"></i> Tidak ada pengumuman
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Pengumuman -->
    <div id="pengumumanModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); z-index:1050;">
        <div class="modal-dialog modal-lg mt-5 mx-auto bg-white rounded-4 p-4 position-relative" style="max-width: 800px;" onclick="event.stopPropagation();">
            <!-- Tombol Close -->
            <button type="button" id="closePengumumanBtn" class="position-absolute top-0 end-0 m-3 btn-close" aria-label="Close"></button>

            <h3 id="modalJudul" class="mb-2 fw-bold"></h3>
            <p class="text-muted" id="modalTanggal"></p>
            <div id="modalIsi" style="white-space: pre-wrap;"></div>
        </div>
    </div>

    <script>
        function showPengumumanModal(judul, tanggal, isi) {
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalTanggal').textContent = tanggal;
            document.getElementById('modalIsi').textContent = isi;
            document.getElementById('pengumumanModal').style.display = 'block';
        }

        // Tutup modal saat klik di luar isi modal
        document.getElementById('pengumumanModal').addEventListener('click', function () {
            this.style.display = 'none';
        });

        // Tombol close
        document.getElementById('closePengumumanBtn').addEventListener('click', function () {
            document.getElementById('pengumumanModal').style.display = 'none';
        });
    </script>
</section>
@endsection
