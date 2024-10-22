@extends('components.navbar')
@section('content')
<h1>Rute Page</h1>
<a href="/admin/rute/create" class="btn btn-primary">Tambah rute</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>maskapai</th>
            <th>kapasitas</th>
            <th>rute awal</th>
            <th>rute tujuan</th>
            <th>tanggal pergi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rute as $data)
        <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->maskapai->nama_maskapai }}</p></td>
            <td><p>{{ $data->maskapai->kapasitas }}</p></td>
            <td><p>{{ $data->rute_asal }}</p></td>
            <td><p>{{ $data->rute_tujuan }}</p></td>
            <td><p>{{ $data->tanggal_pergi }}</p></td>
            <td>
                <a href="/admin/rute/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/rute/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
