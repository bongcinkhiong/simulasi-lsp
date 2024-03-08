@extends('components.navbar')
@section('content')
<div class="row">
    <div class="col-5"></div>
    <div class="col-3 bg-primary px-5 py-4 rounded">
        <h3 class="text-white mb-4"><b>Bukti Pemesanan</b></h3>
        <p class=" text-white"><b>Nama Pemesan</b> : {{ Auth::user()->nama_lengkap }}</p>
        <p class=" text-white"><b>Rute Asal</b> : {{ $tiket->jadwal->rute->rute_asal }}</p>
        <p class=" text-white"><b>Rute Tujuan</b> : {{ $tiket->jadwal->rute->rute_tujuan }} </p>
        <p class=" text-white"><b>Tanggal Pergi</b> :  {{ $tiket->jadwal->rute->tanggal_pergi }} </p>
        <p class=" text-white"><b>Juamlah Tiket</b> : {{ $tiket->jumlah_tiket }} </p>
        <p class=" text-white"><b>Total Harga</b> : Rp.{{ $tiket->total_harga }} </p>
        <p class=" text-white"><b>Tanggal Trsansaksi</b> : {{ $tiket->tiket->tanggal_transaksi }} </p>
        <a href="/pengguna/riwayat" class="text-white btn btn-danger">Kembali</a>
    </div>
</div>
@endsection
