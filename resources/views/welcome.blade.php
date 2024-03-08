@extends('components.navbar')
@section('content')
        <h1>Selamat datang di website pemesanan pesawat</h1>
        <h2>Jadwal penerbangan</h2>
        <div class="row">
            @foreach ($jadwal as $data)
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/storage/images/{{ $data->rute->maskapai->logo_maskapai }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title">{{ $data->rute->maskapai->nama_maskapai }}</h5>
                                <p class="card-text">{{ $data->rute->rute_asal}} Ke {{ $data->rute->rute_tujuan}} | {{ $data->rute->tanggal_pergi}} | {{ $data->waktu_berangkat}} | Waktu Tiba: {{ $data->waktu_tiba }}</p>
                                <p class="card-text"><p class="text-body-secondary">Rp.{{ number_format($data->harga) }}</p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
