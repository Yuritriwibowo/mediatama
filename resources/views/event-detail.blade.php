@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- ======================================
            STYLE DETAIL EVENT
    ======================================= --}}
    <style>
        .event-hero {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .event-hero img {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        .event-info-box {
            background: #ffffff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.10);
            margin-top: -60px;
            position: relative;
        }

        .event-title {
            font-size: 30px;
            font-weight: 800;
            color: #d6002a;
        }

        .event-date {
            background: #d6002a;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }

        .event-desc {
            font-size: 17px;
            line-height: 1.7;
            color: #444;
        }

        .event-section-title {
            font-weight: 700;
            margin-top: 32px;
            margin-bottom: 8px;
            color: #222;
        }

        .join-btn {
            background: #d6002a;
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            display: inline-block;
            font-size: 17px;
            font-weight: 600;
            transition: .25s;
            text-decoration: none;
        }
        .join-btn:hover {
            background: #b40022;
            color: #fff;
        }
    </style>


    {{-- ======================================
                HERO IMAGE
    ======================================= --}}
    <div class="event-hero mb-4">
        <img src="https://images.unsplash.com/photo-1515165562835-c4c7b0d1d6b4"
             alt="Event Image">
    </div>


    {{-- ======================================
           EVENT INFORMATION BOX
    ======================================= --}}
    <div class="event-info-box">

        <h2 class="event-title">Workshop Guru: Teknik Mengajar Kreatif</h2>

        <div class="event-date">28 Februari 2025</div>

        <p class="event-desc mt-3">
            Workshop ini dirancang khusus untuk meningkatkan kompetensi guru dalam menyusun
            strategi dan teknik mengajar yang kreatif, menarik, dan efektif untuk siswa. 
            Pada kegiatan ini, para peserta akan belajar bagaimana menciptakan suasana belajar 
            yang interaktif dan produktif.
        </p>


        {{-- ======================================
               DETAIL INFORMASI EVENT
        ======================================= --}}
        <h5 class="event-section-title">📍 Lokasi</h5>
        <p class="event-desc">
            Aula Utama — Gedung Mediatama  
            Jl. Mediatama No. 123, Solo
        </p>

        <h5 class="event-section-title">🕒 Waktu</h5>
        <p class="event-desc">
            09.00 – 14.00 WIB
        </p>

        <h5 class="event-section-title">🎯 Target Peserta</h5>
        <p class="event-desc">
            Guru SD, SMP, SMA / SMK  
        </p>

        <h5 class="event-section-title">📘 Materi Workshop</h5>
        <ul class="event-desc">
            <li>Strategi Mengajar Modern</li>
            <li>Pembelajaran Berbasis Proyek</li>
            <li>Teknik Membuat Kelas Interaktif</li>
            <li>Mengoptimalkan Media Pembelajaran</li>
        </ul>

        <h5 class="event-section-title">🎤 Narasumber</h5>
        <p class="event-desc">
            Dr. Wahyu Prasetyo, M.Pd — Pakar Pendidikan Nasional  
            Dosen & Peneliti Metode Pembelajaran Modern
        </p>


        {{-- ======================================
                   BUTTON JOIN
        ======================================= --}}
        <div class="mt-4">
            <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20mendaftar%20workshop%20Mediatama"
               target="_blank"
               class="join-btn">
                🔔 Daftar Sekarang
            </a>

            <a href="/event" class="btn btn-outline-secondary ms-3" style="padding:12px 28px; border-radius:12px;">
                ← Kembali ke Event
            </a>
        </div>

    </div>

</div>
@endsection
