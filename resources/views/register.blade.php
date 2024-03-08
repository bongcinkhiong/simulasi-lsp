@extends('components.navbar')
@section('content')
    <h1>Register Page</h1>
    <form action="" method="post">
        @csrf
        <label class="form-label" for="nama_lengkap">nama_lengkap</label>
        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap">
        @error('nama_lengkap')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="username">username</label>
        <input class="form-control" type="text" name="username" id="username">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label class="form-label" for="password">password</label>
        <input class="form-control" type="password" name="password" id="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">Register</button>
    </form>
@endsection
