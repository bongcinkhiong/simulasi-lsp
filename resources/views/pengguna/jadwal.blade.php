@extends('components.navbar')
@section('content')
<h1>Jadwal page</h1>

<form action="" method="GET">
    <div class="row">
        <div class="col-3">
            <label for="rute_asal">rute asal</label>
            <select class="form-control" name="rute_asal" id="rute_asal">
                <option value="">All</option>
                @foreach ($rute as $item)
                    <option value="{{ $item->rute_asal }}" {{ $item->rute_asal == $rute_asal ? 'selected' : '' }}>{{ $item->rute_asal }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-3">
            <label for="rute_tujuan">rute tujuan</label>
            <select class="form-control" name="rute_tujuan" id="rute_tujuan">
                <option value="">All</option>
                @foreach ($rute as $item)
                    <option value="{{ $item->rute_tujuan }}" {{ $item->rute_tujuan == $rute_tujuan ? 'selected' : '' }}>{{ $item->rute_tujuan }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-3">
            {{-- <label for="" class="fotm-label">a</label> --}}
            <button type="submit" class="btn btn-primary mt-4">Cari</button>
        </div>
    </div>


</form>

<div class="row mt-5">
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
                            <div class="d-flex">
                                <p class="card-text d-inline"><p class="text-body-secondary">Rp.{{ number_format($data->harga) }}</p>
                                <a href="/pengguna/jadwal/{{ $data->id }}" class="d-inline ms-4">Pesan</a></p></p>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</div>

@endsection
