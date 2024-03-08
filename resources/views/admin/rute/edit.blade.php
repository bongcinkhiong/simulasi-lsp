@extends('components.navbar')
@section('content')
    <h1>Tambah Rute</h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="maskapai_id">Maskapai</label>
        <select name="maskapai_id" id="maskapai_id">
            @foreach ($maskapai as $item)
                <option value="{{ $item->id }}" {{ $item->id == $rute->maskapai_id ? 'selected' : '' }}>{{ $item->nama_maskapai }}</option>
            @endforeach
        </select>
        @error('maskapai_id')
            {{ $message }}
        @enderror
        <br>

        <label for="rute_asal">Rute Asal</label>
        <select name="rute_asal" id="rute_asal">
            @foreach ($kota as $item)
                <option value="{{ $item->nama_kota }}" {{ $item->nama_kota == $rute->rute_asal ? 'selected' : '' }}>{{ $item->nama_kota }}</option>
            @endforeach
        </select>
        @error('rute_asal')
            {{ $message }}
        @enderror
        <br>

        <label for="rute_tujuan">Rute Tujuan</label>
        <select name="rute_tujuan" id="rute_tujuan">
            @foreach ($kota as $item)
                <option value="{{ $item->nama_kota }}" {{ $item->nama_kota == $rute->rute_tujuan ? 'selected' : '' }}>{{ $item->nama_kota }}</option>
            @endforeach
        </select>
        @error('rute_tujuan')
            {{ $message }}
        @enderror
        <br>

        <label for="tanggal_pergi">Tanggal Pergi</label>
        <input type="date" name="tanggal_pergi" value="{{ $rute->tanggal_pergi }}" id='tanggal_pergi'>
        @error('tanggal_pergi')
            {{ $message }}
        @enderror
        <button type="submit">Login</button>
    </form>
@endsection
