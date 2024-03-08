@extends('components.navbar')
@section('content')
<h1>kota page</h1>
<a href="/petugas/kota/create">Tambah kota</a>
<table>
    <tr>
        <th>No</th>
        <th>Nama Kota</th>
        <th>Aksi</th>
    </tr>
    @foreach ($kota as $data)
    <tr>
        <td><p>{{ $loop->iteration }}</p></td>
        <td><p>{{ $data->nama_kota }}</p></td>
        <td>
            <a href="/petugas/kota/{{ $data->id }}/edit">Edit</a>
            <a href="/petugas/kota/{{ $data->id }}/delete">Hapus</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
