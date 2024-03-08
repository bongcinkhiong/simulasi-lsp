@extends('components.navbar')
@section('content')
<h1>Riwayat page</h1>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Trsansaksi</th>
            <th>Jumlah Tiket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order as $data)
            <tr>
                <td><p>{{ $loop->iteration }}</p></td>
            <td><p>{{ $data->jadwal->rute->rute_asal }}</p></td>
            <td><p>{{ $data->jadwal->rute->rute_tujuan }}</p></td>
            <td><p>{{ $data->jadwal->waktu_berangkat }}</p></td>
            <td><p>{{ $data->jumlah_tiket }}</p></td>
            <td><p>{{ $data->total_harga }}</p></td>
            <td><p>{{ $data->acc }}</p></td>
            <td>
                <a href="/pengguna/jadwal/riwayat/{{ $data->id }}" class="btn btn-primary">Detial Pesanan</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
