@extends('layouts.main')

@section('title', 'Kategori Pertandingan')

@section('content')
  <div class="text-center mb-4">
      <h2>PORLEMPIKA</h2>
  </div>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <div class="mb-3">
      <a href="{{ route('kategori_pertandingan.create') }}" class="btn btn-primary">
          Tambah Kategori Pertandingan
      </a>
  </div>

  <table class="table table-bordered table-striped">
      <thead class="table-dark text-center">
          <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Aturan</th>
              <th>Batasan</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($kategoripertandingans as $index => $kategori)
              <tr>
                  <td class="text-center">{{ $index + 1 }}</td>
                  <td>{{ $kategori->nama }}</td>
                  <td>{{ $kategori->aturan }}</td>
                  <td>{{ $kategori->batasan }}</td>
                  <td class="text-center">
                      <a href="{{ route('kategori_pertandingan.edit', $kategori->id) }}"
                         class="btn btn-warning btn-sm me-1">Edit</a>
                      <form action="{{ route('kategori_pertandingan.destroy', $kategori->id) }}"
                            method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                                  class="btn btn-danger btn-sm"
                                  onclick="return confirm('Yakin mau hapus?')">
                              Hapus
                          </button>
                      </form>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="5" class="text-center">Belum ada kategori pertandingan</td>
              </tr>
          @endforelse
      </tbody>
  </table>
@endsection
