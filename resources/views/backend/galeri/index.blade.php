@extends('backend.layouts.main')
@section('title', 'Halaman Galeri')
@section('navMhs', 'active')

@section('content')
    <div class="text-center mb-4">
        <h2>Galeri</h2>
        <hr>
    </div>

   @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('backend.galeri.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($galeris as $galeri)
            <div class="col">
                <div class="card shadow-sm rounded-4">
                    <img src="{{ asset('uploads/' . $galeri->gambar) }}" class="card-img-top" alt="gambar"
                        style="height: 200px; object-fit: cover; cursor: pointer;"
                        onclick="openModal(
                             '{{ asset('uploads/' . $galeri->gambar) }}',
                             `{{ addslashes($galeri->judul) }}`,
                             `{{ addslashes($galeri->deskripsi) }}`
                         )">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                        <p class="card-text text-white">{{ $galeri->deskripsi }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('backend.galeri.edit', $galeri->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('backend.galeri.destroy', $galeri->id) }}" method="POST"
                                class="d-inline" onsubmit="return handleDeleteGaleri()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </div>
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

    <!-- Modal Preview Gambar + Judul + Deskripsi -->
    <div id="imageModal" class="modal" onclick="closeModal()">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content-wrapper" onclick="event.stopPropagation()">
            <img id="modalImage" class="modal-image">
            <h3 id="modalTitle" class="modal-title text-white mt-3"></h3>
            <p id="modalDescription" class="modal-description text-white"></p>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, 0.85);
        }

        .modal-content-wrapper {
            text-align: center;
            max-width: 80%;
            margin: auto;
        }

        .modal-image {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .modal-description {
            font-size: 1.2rem;
            margin-top: 10px;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #ffffff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <script>
        function openModal(imageSrc, title, description) {
            document.getElementById("imageModal").style.display = "block";
            document.getElementById("modalImage").src = imageSrc;
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDescription").innerText = description;
        }

        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }

        function handleDeleteGaleri() {
            const userRole = @json(Auth::user()->role);
            if (userRole !== 'admin') {
                alert('Hanya admin yang dapat menghapus');
                return false;
            }
            return confirm('Yakin mau hapus?');
        }
    </script>
   
@endsection
