@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Manajemen Banner</h3>

    <a href="{{ route('banner.create') }}" class="btn btn-primary mb-3">+ Tambah Banner</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th width="200">Gambar</th>
                <th>Judul</th>
                <th>Link</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $b)
                <tr>
                    <td>
                        <img src="{{ asset(ltrim($b->image, '/')) }}" width="200">
                    </td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->link }}</td>
                    <td>
                        <form action="{{ route('banner.delete', $b->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
