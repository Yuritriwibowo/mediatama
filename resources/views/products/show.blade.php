@extends('layouts.app')

@section('content')
<div class="container">

    {{-- =============================
         CUSTOM STYLE — HIGH READABILITY
    ============================== --}}
    <style>

        /* KATEGORI (Badge Emboss) */
        .badge-category {
            background: linear-gradient(135deg, #d6002a, #b40022);
            font-size: 13px;
            padding: 7px 14px;
            border-radius: 30px;
            color: white;
            font-weight: 700;

            text-shadow: 
                1px 1px 2px rgba(0,0,0,0.35),
                -1px -1px 1px rgba(255,255,255,0.25);
        }

        /* Gambar */
        .book-image {
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.22);
        }

        /* Label info buku */
        .info-label {
            font-weight: 700;
            color: #333;
            font-size: 15px;
        }

        /* Value lebih gelap dan jelas */
        .info-value {
            font-weight: 600;
            font-size: 15px;
            color: #000;
        }

        /* Judul Buku Emboss */
        .book-title {
            font-size: 30px;
            font-weight: 800;
            color: #222;

            text-shadow:
                1px 1px 3px rgba(0,0,0,0.25),
                -1px -1px 1px rgba(255,255,255,0.4);
        }

        /* Harga Timbul */
        .price-emboss {
            font-size: 28px;
            font-weight: 900;
            color: #d6002a;

            text-shadow:
                1px 1px 4px rgba(0,0,0,0.25),
                -1px -1px 2px rgba(255,255,255,0.5);
        }

        /* Tombol Primary */
        .btn-primary-modern {
            background: linear-gradient(135deg, #d6002a, #b40022);
            border: none;
            padding: 12px 26px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            color: white;

            box-shadow: 0 4px 10px rgba(214,0,42,0.35);
            transition: 0.25s;
        }
        .btn-primary-modern:hover {
            background: #a8001f;
            box-shadow: 0 6px 18px rgba(214,0,42,0.45);
        }

        /* Tombol Outline */
        .btn-outline-modern {
            border: 2px solid #d6002a;
            padding: 12px 26px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            color: #d6002a;

            transition: 0.25s;
        }

        .btn-outline-modern:hover {
            background: #d6002a;
            color: white;
            box-shadow: 0 5px 12px rgba(214,0,42,0.35);
        }

        /* Card produk terkait */
        .related-card {
            border-radius: 14px;
            overflow: hidden;
            border: none;
            background: white;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            transition: 0.25s;
        }

        .related-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.25);
        }

        .related-title {
            font-size: 15px;
            font-weight: 700;
            color: #222;

            text-shadow: 1px 1px 2px rgba(0,0,0,0.25);
        }
    </style>


    {{-- =============================
         BACK BUTTON
    ============================== --}}
    <a href="/produk" class="btn btn-outline-secondary mb-3">← Kembali ke Produk</a>


    <div class="row">

        {{-- =============================
             GAMBAR PRODUK
        ============================== --}}
        <div class="col-md-4 mb-4">
            <img src="{{ asset(ltrim($book->image, '/')) }}"
                 class="book-image"
                 alt="{{ $book->title }}">
        </div>



        {{-- =============================
             INFORMASI PRODUK
        ============================== --}}
        <div class="col-md-8">

            <h3 class="book-title">{{ $book->title }}</h3>

            <span class="badge-category">{{ $book->category }}</span>

            <h4 class="mt-3 price-emboss">
                Rp {{ number_format($book->price, 0, ',', '.') }}
            </h4>


            {{-- =============================
                 DETAIL BUKU
            ============================== --}}
            <div class="row mt-4">

                @php
                    $details = [
                        'Halaman' => $book->pages,
                        'Kurikulum' => $book->curriculum,
                        'Jenjang' => $book->grade,
                        'Kelas' => $book->class,
                        'Kategori' => $book->category,
                        'Golongan' => $book->group,
                        'Penerbit' => 'Penerbit Mediatama',
                        'ISBN' => $book->isbn,
                        'Diterbitkan' => $book->published_at,
                    ];
                @endphp

                @foreach ($details as $label => $value)
                    <div class="col-md-6 mb-3">
                        <div class="info-label">{{ $label }}:</div>
                        <div class="info-value">{{ $value ?: '-' }}</div>
                    </div>
                @endforeach

            </div>


            {{-- =============================
                 DESKRIPSI
            ============================== --}}
            <h5 class="mt-4 fw-bold">Deskripsi</h5>
            <p style="font-size: 16px; line-height: 1.8; color:#333;">
                {{ $book->description ?? 'Tidak ada deskripsi.' }}
            </p>


            {{-- =============================
                 TOMBOL AKSI
            ============================== --}}
            <div class="mt-4 d-flex gap-3">

                {{-- Lihat Prelim --}}
                @if($book->sample_link)
                <a href="{{ $book->sample_link }}"
                   target="_blank"
                   class="btn btn-outline-modern">
                    📘 Lihat Prelim
                </a>
                @endif

                {{-- Tambah ke Keranjang --}}
                <a href="{{ route('cart.add', $book->id) }}"
                   class="btn btn-primary-modern">
                    🛒 Tambah ke Keranjang
                </a>

            </div>

        </div>
    </div>



    {{-- =============================
         PRODUK TERKAIT
    ============================== --}}
    <hr class="my-5">

    <h4 class="fw-bold mb-3">Buku Terkait</h4>

    <div class="row">
        @forelse ($related as $item)
        <div class="col-md-3 mb-4">

            <a href="{{ route('produk.show', $item->id) }}"
               class="text-decoration-none text-dark">

                <div class="related-card">

                    <img src="{{ asset(ltrim($item->image, '/')) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;">

                    <div class="p-3">

                        <div class="text-muted" style="font-size: 12px;">
                            {{ $item->category }}
                        </div>

                        <h6 class="related-title mt-1">{{ $item->title }}</h6>

                        <div class="text-danger fw-bold">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            </a>

        </div>
        @empty
        <p class="text-muted">Tidak ada buku terkait.</p>
        @endforelse
    </div>

</div>
@endsection
