@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ================================
         PREMIUM STYLE
    ================================= --}}
    <style>
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
            box-shadow: 0px 0px 8px rgba(176, 0, 32, 0.3);
        }

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
            box-shadow: 0 4px 12px rgba(176, 0, 32, 0.25);
        }

        .product-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: white;
            transition: .3s;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.13);
        }

        .product-card img {
            height: 260px;
            width: 100%;
            object-fit: cover;
        }

        .price {
            font-weight: 700;
            font-size: 18px;
            color: #b00020;
        }

        .book-title {
            font-weight: 700;
            color: #222;
        }
    </style>


    {{-- ================================
         HEADER
    ================================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="hero-title">📚 Koleksi Buku Mediatama</h2>

        <div style="width: 330px;">
            <input type="text" id="searchBox" class="form-control search-box" placeholder="🔎 Cari judul buku..." autocomplete="off">
        </div>
    </div>


    {{-- ================================
         KATEGORI
    ================================= --}}
    <div class="mb-4">
        <span class="category-pill active" data-category="">Semua</span>

        @foreach ($categories as $cat)
            <span class="category-pill" data-category="{{ $cat }}">{{ $cat }}</span>
        @endforeach
    </div>


    {{-- ================================
         GRID PRODUK
    ================================= --}}
    <div class="row" id="productGrid">

        @foreach ($books as $book)
            @php $img = ltrim($book->image, '/'); @endphp

            <div class="col-md-3 mb-4">
                <a href="{{ route('produk.show', $book->id) }}" class="text-decoration-none">

                    <div class="product-card">
                        <img src="{{ asset($img) }}" alt="{{ $book->title }}">

                        <div class="p-3">
                            <div class="text-muted small text-uppercase">
                                {{ $book->category }}
                            </div>

                            <h6 class="book-title mt-1">{{ $book->title }}</h6>

                            <div class="price mt-2">
                                Rp{{ number_format($book->price, 0, ',', '.') }}
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
     AJAX FILTER + SEARCH
================================= --}}
<script>
document.getElementById('searchBox').addEventListener('keyup', function () {
    let keyword = this.value;

    fetch(`/ajax/search-produk?keyword=` + keyword)
        .then(res => res.text())
        .then(html => document.getElementById('productGrid').innerHTML = html);
});

document.querySelectorAll('.category-pill').forEach(btn => {
    btn.addEventListener('click', function () {

        document.querySelectorAll('.category-pill').forEach(el => el.classList.remove('active'));
        this.classList.add('active');

        let cat = this.getAttribute('data-category');

        fetch(`/ajax/filter-kategori?category=` + cat)
            .then(res => res.text())
            .then(html => document.getElementById('productGrid').innerHTML = html);
    });
});
</script>

@endsection
