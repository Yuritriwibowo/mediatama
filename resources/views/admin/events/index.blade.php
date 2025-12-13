@extends('layouts.app')

@section('content')
<div class="container">

<h3 class="fw-bold mb-4">📅 Manajemen Event</h3>

<a href="{{ route('admin.events.create') }}"
   class="btn btn-danger mb-4"
   style="border-radius:12px;">
   + Tambah Event
</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-modern">

<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Tanggal</th>
    <th width="160">Aksi</th>
</tr>
</thead>

<tbody>
@forelse($events as $e)
<tr>
<td>
@if($e->image)
<img src="{{ asset($e->image) }}" width="70" class="rounded">
@else
<span class="text-muted">-</span>
@endif
</td>

<td class="fw-semibold">{{ $e->title }}</td>
<td>{{ $e->category }}</td>
<td>{{ $e->start_date }}</td>

<td>
<a href="{{ route('admin.events.edit', $e->id) }}"
   class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('admin.events.delete', $e->id) }}"
      method="POST"
      class="d-inline">
@csrf
@method('DELETE')
<button onclick="return confirm('Hapus event?')"
        class="btn btn-danger btn-sm">
Hapus
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5" class="text-center text-muted">Belum ada event</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<div class="mt-4">
{{ $events->links() }}
</div>

</div>
@endsection
