@extends('components.navbar')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 bg-primary px-5 py-4 rounded">
        <h3 class="text-white mb-4"><b>Konfirmasi Pemesanan</b></h3>
        <p class=" text-white">Nama Pemesan: {{ Auth::user()->nama_lengkap }}</p>
        <p class=" text-white">Rute Asal: {{ $jadwal->rute->rute_asal }}</p>
        <p class=" text-white">Rute Tujuan: {{ $jadwal->rute->rute_asal }} </p>
        <p class=" text-white">Tanggal Pergi:  {{ $jadwal->rute->tanggal_pergi }} </p>
        <p class=" text-white">Juamlah Tiket: {{ $jumlah_tiket }} </p>
        <p class=" text-white">Total Harga: {{ $total_harga }} </p>
        <p class=" text-white">Tanggal Trsansaksi: {{ $tanggal_transaksi }} </p>
        <form action="/pengguna/jadwal/pesan" method="post">
            @csrf
            <input hidden type="text" name="user_id" value="{{ Auth::user()->id }}">
            <input hidden type="text" name="jadwal_id" value="{{ $jadwal->id }}">
            <input hidden type="text" name="jumlah_tiket" value="{{ $jumlah_tiket }}">
            <input hidden type="text" name="total_harga" value="{{ $total_harga }}">
            <input hidden type="text" name="tanggal_transaksi" value="{{ $tanggal_transaksi }}">

            <a href="/pengguna/jadwal" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Konirmasi</button>
        </form>
    </div>
</div>
@endsection
