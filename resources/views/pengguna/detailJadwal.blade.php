@extends('components.navbar')
@section('content')
<h1>Jadwal page</h1>

<form action="/pengguna/jadwal/konfirmasi" method="post">
    @csrf
    <span><h4>Maskapai        : {{ $jadwal->rute->maskapai->nama_maskapai }}</h4>   </span>
    <span><h4>Kapasitas       : {{ $jadwal->rute->maskapai->kapasitas}}</h4>   </span>
    <span><h4>Rute Awal       : {{ $jadwal->rute->rute_asal}}</h4>   </span>
    <span><h4>Rute Tujuan     : {{ $jadwal->rute->rute_tujuan}}</h4>   </span>
    <span><h4>Tanggal Pergi   : {{ $jadwal->rute->tanggal_pergi}}</h4>   </span>
    <span><h4>Waktu Berangkat : {{ $jadwal->waktu_berangkat}}</h4>   </span>
    <span><h4>Waktu Tiba      : {{ $jadwal->waktu_tiba }}</h4>   </span>
    <span><h4>Harga           : {{ $jadwal->harga }}</h4>   </span>
    <span><h4>Jumlah          : <input type="number" name="jumlah_tiket">   </span>
    <span><h4><button type="submit" class="btn btn-success">Pesan</button>  </span>

    <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">
    <input type="text" hidden name="jadwal_id" value="{{ $jadwal->id }}">

</form>

@endsection
