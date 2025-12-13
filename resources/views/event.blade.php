@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- ======================================
            STYLE EVENT MODERN
    ======================================= --}}
    <style>
        .section-title {
            font-size: 32px;
            font-weight: 800;
            color: #d6002a;
            text-align: center;
            margin-bottom: 40px;
        }

        .event-card {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.10);
            transition: 0.25s;
        }
        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.18);
        }

        .event-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .event-date {
            background: #d6002a;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .event-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .event-desc {
            font-size: 15px;
            color: #555;
        }

        .event-btn {
            background: #d6002a;
            color: #fff;
            border-radius: 10px;
            padding: 10px 22px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: 0.25s;
        }
        .event-btn:hover {
            background: #b40022;
        }
    </style>


    {{-- ======================================
                  JUDUL HALAMAN
    ======================================= --}}
    <h2 class="section-title">📅 Event Terbaru</h2>


    {{-- ======================================
                  LIST EVENT
    ======================================= --}}
    <div class="row">

        {{-- === EVENT 1 === --}}
        <div class="col-md-4 mb-4">
            <div class="event-card">

                <img src="https://images.unsplash.com/photo-1581091018990-3e09f55b1a3f"
                     class="event-image">

                <div class="p-4">
                    <div class="event-date">15 Januari 2025</div>

                    <div class="event-title">Peluncuran Buku Kurikulum Baru 2025</div>

                    <p class="event-desc">
                        Acara resmi peluncuran seri buku kurikulum terbaru Mediatama 
                        untuk jenjang SD – SMA.
                    </p>

                    <a href="{{ route('event.detail') }}" class="event-btn mt-2">Lihat Detail</a>
                </div>

            </div>
        </div>


        {{-- === EVENT 2 === --}}
        <div class="col-md-4 mb-4">
            <div class="event-card">

                <img src="https://images.unsplash.com/photo-1515165562835-c4c7b0d1d6b4"
                     class="event-image">

                <div class="p-4">
                    <div class="event-date">28 Februari 2025</div>

                    <div class="event-title">Workshop Guru: Teknik Mengajar Kreatif</div>

                    <p class="event-desc">
                        Workshop gratis bagi guru untuk meningkatkan keterampilan 
                        mengajar dengan pendekatan kreatif modern.
                    </p>

                    <a href="{{ route('event.detail') }}" class="event-btn mt-2">Lihat Detail</a>
                </div>

            </div>
        </div>


        {{-- === EVENT 3 === --}}
        <div class="col-md-4 mb-4">
            <div class="event-card">

                <img src="https://images.unsplash.com/photo-1544531585-9847b68c8c5e"
                     class="event-image">

                <div class="p-4">
                    <div class="event-date">10 Maret 2025</div>

                    <div class="event-title">Seminar Nasional Pendidikan</div>

                    <p class="event-desc">
                        Seminar yang menghadirkan pakar pendidikan nasional dan 
                        membahas perkembangan sistem pembelajaran di Indonesia.
                    </p>

                    <a href="{{ route('event.detail') }}" class="event-btn mt-2">Lihat Detail</a>
                </div>

            </div>
        </div>

    </div>


    {{-- ======================================
                PESAN MOTIVASI
    ======================================= --}}
    <div class="mt-5 text-center">
        <h4 class="fw-bold">✨ Bergabunglah dalam Event Mediatama!</h4>
        <p class="text-muted" style="font-size:16px;">
            Temukan pengetahuan baru, inspirasi, dan pengalaman berharga untuk dunia pendidikan.
        </p>
    </div>

</div>
@endsection
