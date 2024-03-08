@extends('components.navbar')
@section('content')
    <h1>Tambah kOTA</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nama_kota">Nama Kota</label>
        <input type="text" name="nama_kota" value="{{ old('nama_kota') }}" id="nama_kota">
        @error('nama_kota')
            <p>{{ $message }}</p>
        @enderror
        <br>


        <button type="submit">Login</button>
    </form>
@endsection
