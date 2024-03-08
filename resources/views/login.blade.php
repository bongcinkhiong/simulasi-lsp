@extends('components.navbar')
@section('content')
    <h1>Login Page</h1>
    <form action="" method="post">
        @csrf
        @if (Session::has('success'))
            <p>{{ Session::get('success') }}</p>
        @endif
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

        <button type="submit" class="btn btn-success">Login</button>
    </form>
@endsection
