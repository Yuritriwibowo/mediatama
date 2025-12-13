@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">✏ Edit Event</h3>

    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="title" value="{{ $event->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ $event->category }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="start_date" value="{{ $event->start_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Event</label><br>

            @if($event->image)
            <img src="{{ asset($event->image) }}" width="150" class="rounded mb-2">
            @endif

            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-danger px-4 py-2">Simpan Perubahan</button>

    </form>

</div>
@endsection
