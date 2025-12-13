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
    EVENT SLIDER – 2 EVENT PER SLIDE
    ================================ */
    .event-carousel .carousel-item {
        padding: 10px 0;
    }

    .event-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(0,0,0,0.12);
        transition: .25s;
        height: 100%;
    }

    .event-card:hover {
        transform: translateY(-6px);
    }

    .event-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .event-content {
        padding: 18px;
        display: flex;
        flex-direction: column;
        height: 260px;
    }

    .event-date {
        background: #d6002a;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 8px;
        width: fit-content;
    }

    .event-title {
        font-size: 16px;
        font-weight: 800;
        min-height: 44px;
    }

    .event-desc {
        font-size: 14px;
        color: #555;
        flex-grow: 1;
    }

    .event-btn {
        font-weight: 700;
        color: #d6002a;
        text-decoration: none;
    }

    .event-btn:hover {
        text-decoration: underline;
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


        /* ===============================
    BEST SELLER – FIX HEIGHT
    ================================ */
    .book-card {
        border-radius: 16px;
        overflow: hidden;
        background: white;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        transition: .25s;

        /* 🔥 KUNCI TINGGI CARD */
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .book-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 22px rgba(0,0,0,0.18);
    }

    /* IMAGE SAMA */
    .book-card img {
        height: 260px;
        width: 100%;
        object-fit: cover;
    }

    /* CONTENT FLEX */
    .book-card .p-3 {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* KATEGORI */
    .book-card .text-muted {
        font-size: 12px;
        text-transform: uppercase;
    }

    /* 🔒 JUDUL DIKUNCI 2 BARIS */
    .book-title {
        font-size: 15px;
        font-weight: 700;
        color: #222;
        min-height: 44px; /* ± 2 baris */
    }

    /* 🔒 HARGA SELALU DI BAWAH */
    .book-price {
        margin-top: auto;
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
    EVENT TERBARU – 2 EVENT PER SLIDE
============================================= --}}
<h2 class="section-title mt-5 mb-4">📅 Event Terbaru</h2>

<div id="eventCarousel" class="carousel slide event-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">

        @foreach($events->chunk(2) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="row">

                @foreach($chunk as $event)
                <div class="col-md-6 mb-4">
                    <div class="event-card h-100">

                        {{-- IMAGE --}}
                        @if($event->image)
                            <img src="{{ asset($event->image) }}" class="event-image">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Event+Mediatama"
                                 class="event-image">
                        @endif

                        {{-- CONTENT --}}
                        <div class="event-content">

                            <div class="event-date">
                                {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}
                            </div>

                            <div class="event-title mt-1">
                                {{ $event->title }}
                            </div>

                            <div class="event-desc">
                                {{ Str::limit(strip_tags($event->description), 90) }}
                            </div>

                            <a href="{{ route('events.show', $event->slug) }}" class="event-btn mt-2">
                                Lihat Detail →
                            </a>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

    </div>

    {{-- BUTTON CONTROL --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>





    {{-- =============================================
            CATEGORY SECTION
    ============================================== --}}
    <h2 class="section-title mb-4">Kategori Buku</h2>

    <div class="row mb-5">

        <div class="col-md-3 mb-4" data-aos="fade-up">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/512/5831/5831920.png" class="category-icon">
                <h6 class="fw-bold">Buku Teks</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/256/2258/2258853.png" class="category-icon">
                <h6 class="fw-bold">Non Teks</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/256/11426/11426740.png" class="category-icon">
                <h6 class="fw-bold">SMP</h6>
            </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="category-box">
                <img src="https://cdn-icons-png.flaticon.com/256/953/953610.png" class="category-icon">
                <h6 class="fw-bold">SMA/SMK</h6>
            </div>
        </div>

    </div>




        {{-- =============================================
        BEST SELLER SECTION (FIXED)
    ============================================= --}}
    <h2 class="section-title mb-4">Buku Best Seller</h2>

    <div class="row">
        @foreach (\App\Models\Product::inRandomOrder()->take(4)->get() as $book)
        <div class="col-md-3 mb-4">
            <a href="{{ route('produk.show', $book->id) }}"
            class="text-decoration-none text-dark h-100 d-block">

                <div class="book-card h-100">

                    <img src="{{ asset(ltrim($book->image, '/')) }}" alt="{{ $book->title }}">

                    <div class="p-3">
                        <div class="text-muted">
                            {{ $book->category }}
                        </div>

                        <div class="book-title mt-1">
                            {{ $book->title }}
                        </div>

                        <div class="book-price mt-2">
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
