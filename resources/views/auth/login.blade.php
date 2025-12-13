@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 450px; margin-top: 40px;">

    <h3 class="text-center mb-4">Login Admin</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            Email atau password salah.
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password"
                   class="form-control" required>
        </div>

        <button class="btn btn-danger w-100 mt-3">Login</button>
    </form>

</div>
@endsection
