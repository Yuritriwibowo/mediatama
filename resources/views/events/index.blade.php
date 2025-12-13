@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">📅 Semua Event</h2>

    <style>
        .event-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: .25s;
            height: 100%;
        }

        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.15);
        }

        .event-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .event-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 240px);
        }

        .event-date {
            font-size: 13px;
            font-weight: 600;
            color: #d6002a;
            margin-bottom: 6px;
        }

        .event-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            min-height: 48px;
        }

        .event-desc {
            font-size: 14px;
            color: #555;
            flex-grow: 1;
        }

        .event-btn {
            margin-top: 15px;
            background: #d6002a;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .event-btn:hover {
            background: #b40022;
            color: #fff;
        }
    </style>

    <div class="row g-4">

        @forelse ($events as $event)
            {{-- 🔥 2 EVENT PER BARIS --}}
            <div class="col-md-6 col-12">

                <div class="event-card h-100">

                    {{-- GAMBAR --}}
                    @if($event->image)
                        <img src="{{ asset($event->image) }}" class="event-img">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=Event+Mediatama" class="event-img">
                    @endif

                    {{-- BODY --}}
                    <div class="event-body">

                        <div class="event-date">
                            {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
                        </div>

                        <div class="event-title">
                            {{ $event->title }}
                        </div>

                        <div class="event-desc">
                            {{ Str::limit(strip_tags($event->description), 120) }}
                        </div>

                        <a href="{{ route('events.show', $event->slug) }}" class="event-btn">
                            Lihat Detail
                        </a>

                    </div>
                </div>

            </div>
        @empty
            <div class="col-12 text-center text-muted">
                Belum ada event.
            </div>
        @endforelse

    </div>

</div>
@endsection
