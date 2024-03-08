@extends('components.navbar')
@section('content')
<h1>kota page</h1>
<a href="/admin/kota/create" class="btn btn-primary">Tambah kota</a>
<table class="table">
    <thead>

        <tr>
            <th>No</th>
            <th>Nama Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($kota as $data)
        <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->nama_kota }}</p></td>
            <td>
                <a href="/admin/kota/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/kota/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
