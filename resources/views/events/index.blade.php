@extends('layouts.app')

@section('content')
<div class="container py-5">

<h2 class="fw-bold mb-4">📅 Semua Event</h2>

@if($events->count() == 0)
    <div class="text-center py-5">
        <h5 class="text-muted">Belum ada event tersedia</h5>
        <p class="text-muted">Silakan cek kembali nanti.</p>
    </div>
@else
    <div class="row">
        @foreach($events as $event)
        <div class="col-md-4 mb-4">
            <div class="event-card">
                <img src="{{ asset($event->image ?? 'images/no-image.jpg') }}"
                     class="event-image">

                <div class="p-3">
                    <div class="event-date">
                        {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
                    </div>

                    <h5 class="fw-bold mt-2">{{ $event->title }}</h5>

                    <p class="text-muted">
                        {{ Str::limit($event->description, 100) }}
                    </p>

                    <a href="{{ route('events.show', $event->slug) }}"
                       class="fw-bold text-danger text-decoration-none">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

</div>
@endsection
