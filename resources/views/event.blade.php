@extends('layouts.app')

@section('content')
<div class="container py-5">

<h2 class="fw-bold text-center text-danger mb-5">📅 Event Mediatama</h2>

<div class="row">

@forelse ($events as $event)
<div class="col-md-4 mb-4">
    <div class="event-card">

        <img src="{{ asset($event->image ?? 'images/no-image.jpg') }}"
             class="event-image">

        <div class="p-4">
            <div class="event-date">
                {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
            </div>

            <div class="event-title mt-2">{{ $event->title }}</div>

            <p class="event-desc">
                {{ Str::limit($event->description, 100) }}
            </p>

            <a href="{{ route('events.show', $event->slug) }}"
               class="event-btn mt-2">
                Lihat Detail
            </a>
        </div>

    </div>
</div>
@empty
<p class="text-center text-muted">Belum ada event.</p>
@endforelse

</div>
</div>
@endsection
