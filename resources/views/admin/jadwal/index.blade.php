@extends('components.navbar')
@section('content')
<h1>Jadwal page</h1>
<a href="/admin/jadwal/create" class="btn btn-primary">Tambah Jadwal</a>
<table class="table">
    <thead>

        <tr>
            <th>No</th>
            <th>Maskapai</th>
            <th>Kapasitas</th>
            <th>Rute Awal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Waktu Berangkat</th>
            <th>Waktu Tiba</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($jadwal as $data)
        <tr>
            <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->rute->maskapai->nama_maskapai }}</p></td>
            <td><p>{{ $data->rute->maskapai->kapasitas}}</p></td>
            <td><p>{{ $data->rute->rute_asal}}</p></td>
            <td><p>{{ $data->rute->rute_tujuan}}</p></td>
            <td><p>{{ $data->rute->tanggal_pergi}}</p></td>
            <td><p>{{ $data->waktu_berangkat}}</p></td>
            <td><p>{{ $data->waktu_tiba }}</p></td>
            <td><p>{{ number_format($data->harga) }}</p></td>
            <td>
                <a href="/admin/jadwal/{{ $data->id }}/edit">Edit</a>
                <a href="/admin/jadwal/{{ $data->id }}/delete">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
