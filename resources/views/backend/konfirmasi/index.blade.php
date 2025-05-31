@extends('backend.layouts.main')
@section('title', 'Daftar Pengumuman')
@section('navMhs', 'active')

@section('content')
<h4>User Menunggu Persetujuan</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendingUsers as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('backend.konfirmasi.approve', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
