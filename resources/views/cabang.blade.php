@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- ===========================
         STYLE MODERN CABANG
    ============================ --}}
    <style>
        .branch-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.10);
            transition: 0.25s;
        }
        .branch-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.15);
        }
        .branch-header {
            font-size: 28px;
            font-weight: 800;
            color: #d6002a;
        }
        .info-label {
            font-size: 15px;
            font-weight: 600;
            color: #555;
        }
        .info-text {
            font-size: 16px;
            color: #222;
        }
        .map-frame {
            width: 100%;
            height: 350px;
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            border: 0;
        }
    </style>


    {{-- ===========================
          JUDUL HALAMAN
    ============================ --}}
    <h2 class="fw-bold mb-4 text-center">
        📍 Cabang Mediatama – Solo
    </h2>


    {{-- ===========================
          CARD INFORMASI CABANG
    ============================ --}}
    <div class="branch-card mb-5">

        <h3 class="branch-header mb-3">Mediatama – Cabang Solo</h3>

        <div class="row">
            <div class="col-md-6">

                <p class="mb-2">
                    <span class="info-label">Alamat:</span><br>
                    <span class="info-text">Jl. Mediatama No. 123, Kota Solo, Jawa Tengah</span>
                </p>

                <p class="mb-2">
                    <span class="info-label">Telepon:</span><br>
                    <span class="info-text">021-12345678</span>
                </p>

                <p class="mb-3">
                    <span class="info-label">Email:</span><br>
                    <span class="info-text">mediatama@example.com</span>
                </p>

                <a href="https://wa.me/6281234567890"
                   target="_blank"
                   class="btn px-4 py-2"
                   style="background:#d6002a; color:white; border-radius:8px;">
                    💬 Chat WhatsApp
                </a>

            </div>

            {{-- GOOGLE MAP --}}
            <div class="col-md-6">
                <iframe 
                    class="map-frame"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0267714560765!2d110.83667407499467!3d-7.574055375262481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a168e38787b81%3A0x5027a76e35676d0!2sSurakarta%2C%20Solo!5e0!3m2!1sen!2sid!4v1700000000000">
                </iframe>
            </div>
        </div>

    </div>

</div>
@endsection
