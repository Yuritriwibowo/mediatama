@extends('layouts.app')

@section('content')

{{-- AOS Animation --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>

    /* =============================================
        GLOBAL STYLE
    ============================================== */
    body {
        background: #f5f5f7;
        font-family: 'Inter', sans-serif;
    }

    h2.section-title {
        font-weight: 800;
        color: #222;
    }


        /* ===============================
    EVENT SLIDER – MODERN
    ================================ */
    .event-slider-wrapper {
        overflow-x: auto;
        padding-bottom: 10px;
    }

    .event-slider {
        display: flex;
        gap: 24px;
        scroll-snap-type: x mandatory;
    }

    .event-slide {
        min-width: 320px;
        scroll-snap-align: start;
    }

    .event-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(0,0,0,0.12);
        transition: .25s;
    }

    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 30px rgba(0,0,0,0.2);
    }

    .event-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .event-content {
        padding: 18px;
    }

    .event-date {
        background: #d6002a;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 10px;
    }

    .event-title {
        font-size: 17px;
        font-weight: 800;
        color: #222;
    }

    .event-desc {
        font-size: 14px;
        color: #555;
        min-height: 42px;
    }

    .event-btn {
        margin-top: 10px;
        display: inline-block;
        font-weight: 700;
        color: #d6002a;
        text-decoration: none;
    }
    .event-btn:hover {
        text-decoration: underline;
    }

    /* scrollbar */
    .event-slider-wrapper::-webkit-scrollbar {
        height: 6px;
    }
    .event-slider-wrapper::-webkit-scrollbar-thumb {
        background: #d6002a;
        border-radius: 10px;
    }
    



    /* =============================================
        HERO / BANNER PREMIUM
    ============================================== */
    .hero-banner {
        border-radius: 28px;
        overflow: hidden;
        height: 360px;
        position: relative;
        background: #d6002a;
        background: linear-gradient(135deg, #d6002a, #ff4d6d);
        box-shadow: 0 10px 25px rgba(0,0,0,0.18);
    }

    .hero-left {
        padding: 60px;
        color: white;
    }

    .hero-title {
        font-size: 48px;
        font-weight: 900;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 19px;
        opacity: .9;
    }

    .hero-img {
        position: absolute;
        right: 30px;
        bottom: 0;
        height: 350px;
        filter: drop-shadow(0 6px 12px rgba(0,0,0,0.3));
    }

    .hero-btn {
        background: white;
        padding: 13px 32px;
        border-radius: 12px;
        color: #d6002a;
        font-size: 17px;
        font-weight: 700;
        transition: .25s;
    }

    .hero-btn:hover {
        background: #ffe3e8;
        transform: translateY(-4px);
    }


    /* =============================================
        CATEGORY DISPLAY – PREMIUM BOOK PUBLISHER
    ============================================== */
    .category-box {
        background: white;
        border-radius: 18px;
        padding: 24px;
        text-align: center;
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        transition: .25s;
    }

    .category-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 14px 28px rgba(0,0,0,0.15);
    }

    .category-icon {
        height: 70px;
        margin-bottom: 12px;
    }


    /* =============================================
        BOOK CARD PREMIUM (BEST SELLER)
    ============================================== */
    .book-card {
        border-radius: 16px;
        overflow: hidden;
        background: white;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        transition: .25s;
        border: none;
    }

    .book-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 22px rgba(0,0,0,0.18);
    }

    .book-card img {
        height: 260px;
        width: 100%;
        object-fit: cover;
    }

    .book-title {
        font-size: 15px;
        font-weight: 700;
        color: #222;
        min-height: 40px;
    }

    .book-price {
        color: #d6002a;
        font-size: 18px;
        font-weight: 800;
    }


    /* =============================================
        WHY CHOOSE US SECTION (PUBLISHER STYLE)
    ============================================== */
    .why-box {
        padding: 25px;
        border-radius: 16px;
        background: white;
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        text-align: center;
        transition: .25s;
    }

    .why-box:hover {
        transform: translateY(-6px);
    }

    .why-icon {
        font-size: 40px;
        margin-bottom: 12px;
        color: #d6002a;
    }

</style>




<div class="container mt-4">

    {{-- =============================================
            HERO PREMIUM
    ============================================== --}}
    <div class="hero-banner mb-5" data-aos="fade-up">

        <div class="hero-left">
            <h1 class="hero-title">Buku Terbaik Untuk Masa Depan Indonesia</h1>
            <p class="hero-subtitle mt-3">
                Konten berkualitas tinggi untuk mendukung pembelajaran modern, kurikulum terbaru, dan kebutuhan guru.
            </p>

            <a href="/produk" class="hero-btn mt-4">📚 Jelajahi Buku</a>
        </div>

       
            

    </div>



    {{-- =============================================
        EVENT SLIDER – GRAMEDIA STYLE
============================================= --}}
<h2 class="section-title mt-5 mb-4">📅 Event Terbaru</h2>

<div class="event-slider-wrapper">
    <div class="event-slider">

        @forelse($events as $event)
        <div class="event-slide">
            <div class="event-card">

                <img src="{{ asset($event->image ?? 'images/no-image.jpg') }}"
                     class="event-image">

                <div class="event-content">

                    <div class="event-date">
                        {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
                    </div>

                    <h5 class="event-title">{{ $event->title }}</h5>

                    <p class="event-desc">
                        {{ Str::limit($event->description, 90) }}
                    </p>

                    <a href="{{ route('events.show', $event->slug) }}"
                       class="event-btn">
                        Lihat Detail →
                    </a>

                </div>
            </div>
        </div>
        @empty
            <p class="text-muted">Belum ada event.</p>
        @endforelse

    </div>
</div>



    {{-- =============================================
            CATEGORY SECTION
    ============================================== --}}
    <h2 class="section-title mb-4">Kategori Buku</h2>

    <div class="row mb-5">

        <div class="col-md-3 mb-4" data-aos="fade-up">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="category-icon">
                <h6 class="fw-bold">Buku Teks</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3187/3187963.png" class="category-icon">
                <h6 class="fw-bold">Non Teks</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/512/201/201623.png" class="category-icon">
                <h6 class="fw-bold">SMP</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/512/2965/2965879.png" class="category-icon">
                <h6 class="fw-bold">SMA/SMK</h6>
            </div>
        </div>

    </div>




    {{-- =============================================
            BEST SELLER SECTION
    ============================================== --}}
    <h2 class="section-title mb-4">Buku Best Seller</h2>

    <div class="row">

        @foreach (\App\Models\Product::inRandomOrder()->take(4)->get() as $book)
        <div class="col-md-3 mb-4" data-aos="fade-up">
            <a href="{{ route('produk.show', $book->id) }}" class="text-decoration-none text-dark">
                <div class="book-card">
                    <img src="{{ asset(ltrim($book->image, '/')) }}" alt="Buku">

                    <div class="p-3">
                        <div class="text-muted" style="font-size: 12px;">{{ $book->category }}</div>

                        <div class="book-title mt-1">{{ $book->title }}</div>

                        <div class="book-price">
                            Rp{{ number_format($book->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>




    {{-- =============================================
            WHY CHOOSE US
    ============================================== --}}
    <h2 class="section-title mt-5 mb-4">Kenapa Memilih Mediatama?</h2>

    <div class="row mb-5">

        <div class="col-md-4 mb-3" data-aos="fade-up">
            <div class="why-box">
                <div class="why-icon">🏆</div>
                <h5 class="fw-bold">Standar Kualitas Tinggi</h5>
                <p class="text-muted">Setiap buku melalui proses editorial profesional dan kurasi pendidikan.</p>
            </div>
        </div>

        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="150">
            <div class="why-box">
                <div class="why-icon">📘</div>
                <h5 class="fw-bold">Sesuai Kurikulum Terbaru</h5>
                <p class="text-muted">Konten selalu diperbarui mengikuti perkembangan kurikulum nasional.</p>
            </div>
        </div>

        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="300">
            <div class="why-box">
                <div class="why-icon">🚀</div>
                <h5 class="fw-bold">Distribusi Nasional</h5>
                <p class="text-muted">Dukungan distribusi ke sekolah dan toko buku di seluruh Indonesia.</p>
            </div>
        </div>

    </div>



</div>


{{-- AOS JS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

@endsection
