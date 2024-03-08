@extends('components.navbar')
@section('content')
    <h1>Tambah Pengguna</h1>
    <form action="" method="post">
        @csrf
        <label for="nama_lengkap">nama_lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="nama_lengkap">
        @error('nama_lengkap')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="username">username</label>
        <input type="text" name="username" value="{{ old('username') }}" id="username">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="password">password</label>
        <input type="password" name="password" id="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="pengguna">Pengguna</option>
        </select>

        <button type="submit">Login</button>
    </form>
@endsection
