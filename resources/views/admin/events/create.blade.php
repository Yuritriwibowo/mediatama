@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">➕ Tambah Event Baru</h3>

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Event</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-danger px-4 py-2">Simpan</button>
    </form>

</div>
@endsection
