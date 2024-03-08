@extends('components.navbar')
@section('content')
<h1>penumpang page</h1>
<a href="/admin/pengguna/create" class="btn btn-primary">Tambah Pengguna</a>
<table class="table">
    <thead>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($user as $data)
        <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->nama_lengkap }}</p></td>
            <td><p>{{ $data->username }}</p></td>
            <td><p>{{ $data->role }}</p></td>
            <td>
                <a href="/admin/pengguna/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/pengguna/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
