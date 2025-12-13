@extends('layouts.app')

@section('content')
<div class="container py-5">

<img src="{{ asset($event->image ?? 'images/no-image.jpg') }}"
     class="w-100 rounded-4 mb-4"
     style="height:380px;object-fit:cover;">

<h2 class="fw-bold text-danger">{{ $event->title }}</h2>

<div class="event-date my-3">
    {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
</div>

<p style="font-size:17px;line-height:1.8;">
    {{ $event->description }}
</p>

<a href="{{ route('events.index') }}" class="btn btn-outline-secondary mt-4">
    ← Kembali ke Event
</a>

</div>
@endsection
