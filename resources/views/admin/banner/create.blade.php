@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Tambah Banner</h3>

    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul Banner (opsional)</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Link (opsional)</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gambar Banner</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('banner.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection
