@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ================================
         STYLE (PRODUCTION READY)
    ================================= --}}
    <style>
    /* ================= HEADER ================= */
    .hero-title {
        font-weight: 800;
        font-size: 32px;
        color: #b00020;
    }

    .search-box {
        border-radius: 12px;
        padding: 12px 18px;
        font-size: 16px;
        border: 2px solid #e6e6e6;
        transition: .25s;
    }
    .search-box:focus {
        border-color: #b00020;
        box-shadow: 0 0 8px rgba(176,0,32,.3);
    }

    /* ================= CATEGORY ================= */
    .category-pill {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 25px;
        border: 1px solid #b00020;
        color: #b00020;
        background: white;
        margin-right: 8px;
        margin-bottom: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: .3s;
    }
    .category-pill:hover,
    .category-pill.active {
        background: #b00020;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(176,0,32,.25);
    }

    /* ================= CARD ================= */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0,0,0,.08);
        transition: .3s;
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0,0,0,.13);
    }

    .product-card img {
        height: 260px;
        width: 100%;
        object-fit: cover;
    }

    .product-card .content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 16px;
    }

    .product-category {
        font-size: 12px;
        text-transform: uppercase;
        color: #777;
    }

    .book-title {
        font-weight: 700;
        font-size: 15px;
        color: #222;
        margin-top: 4px;
        min-height: 44px;

        /* max 2 baris */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .price {
        margin-top: auto;
        font-weight: 800;
        font-size: 18px;
        color: #b00020;
    }
    </style>


    {{-- ================================
         HEADER
    ================================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="hero-title">📚 Koleksi Buku Mediatama</h2>

        <div style="width:320px">
            <input type="text" id="searchBox"
                   class="form-control search-box"
                   placeholder="🔎 Cari judul buku..."
                   autocomplete="off">
        </div>
    </div>


    {{-- ================================
         CATEGORY FILTER
    ================================= --}}
    <div class="mb-4">
        <span class="category-pill active" data-category="">Semua</span>

        @foreach($categories as $cat)
            <span class="category-pill" data-category="{{ $cat }}">
                {{ $cat }}
            </span>
        @endforeach
    </div>


    {{-- ================================
         PRODUCT GRID
    ================================= --}}
    <div class="row" id="productGrid">
        @foreach($books as $book)
            @php
                $img = $book->image ? asset(ltrim($book->image,'/')) : asset('images/no-image.jpg');
            @endphp

            <div class="col-md-3 mb-4">
                <a href="{{ route('produk.show',$book->id) }}"
                   class="text-decoration-none text-dark">

                    <div class="product-card">
                        <img src="{{ $img }}" alt="{{ $book->title }}">

                        <div class="content">
                            <div class="product-category">
                                {{ $book->category }}
                            </div>

                            <div class="book-title">
                                {{ $book->title }}
                            </div>

                            <div class="price">
                                Rp{{ number_format($book->price,0,',','.') }}
                            </div>
                        </div>
                    </div>

                </a>
            </div>
        @endforeach
    </div>


    {{-- ================================
         PAGINATION
    ================================= --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>

</div>


{{-- ================================
     AJAX SEARCH & FILTER
================================ --}}
<script>
document.getElementById('searchBox').addEventListener('keyup', function () {
    fetch(`/ajax/search-produk?keyword=${this.value}`)
        .then(res => res.text())
        .then(html => document.getElementById('productGrid').innerHTML = html);
});

document.querySelectorAll('.category-pill').forEach(btn => {
    btn.addEventListener('click', function () {

        document.querySelectorAll('.category-pill')
            .forEach(el => el.classList.remove('active'));

        this.classList.add('active');

        fetch(`/ajax/filter-kategori?category=${this.dataset.category}`)
            .then(res => res.text())
            .then(html => document.getElementById('productGrid').innerHTML = html);
    });
});
</script>

@endsection
