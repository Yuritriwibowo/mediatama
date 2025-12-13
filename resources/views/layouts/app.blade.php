<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediatama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }

        .navbar-custom {
            background-color: #d6002a;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .dropdown-menu-custom {
            background: white;
            border-radius: 10px;
            border: none;
            padding: 12px 0;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 200px;
        }

        .dropdown-menu-custom a:hover {
            background: #ffe3e8;
            color: #d6002a;
            border-radius: 5px;
        }
    </style>
</head>
<body>

@php
    $cart = session('cart', []);
    $cartCount = array_sum(array_column($cart, 'qty'));
@endphp

{{-- ================= NAVBAR ================= --}}
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">

        <a class="navbar-brand text-white fw-bold fs-4" href="/">MEDIATAMA</a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            ☰
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a href="/" class="nav-link text-white">Beranda</a></li>
                <li class="nav-item"><a href="/produk" class="nav-link text-white">Produk</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Marketplace
                    </a>
                    <div class="dropdown-menu dropdown-menu-custom">
                        <a class="dropdown-item" href="https://shopee.co.id/mediatama_shop51" target="_blank">Shopee</a>
                        <a class="dropdown-item" href="https://www.tokopedia.com/mediatama-solo" target="_blank">Tokopedia</a>
                    </div>
                </li>

                <li class="nav-item"><a href="{{ route('profile') }}" class="nav-link text-white">Profil</a></li>
                <li class="nav-item"><a href="{{ route('cabang') }}" class="nav-link text-white">Cabang</a></li>

                {{-- 🔥 FIXED EVENT ROUTE --}}
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link text-white">Event</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cart.page') }}" class="nav-link text-white fw-bold">
                        🛒 Keranjang
                        @if($cartCount > 0)
                            <span class="badge bg-dark">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

{{-- ================= FOOTER ================= --}}
<footer style="background:#8b001c; color:#f8f8f8; padding-top:50px;">
    <div class="container">
        <div class="row">

            <div class="col-md-4 mb-4">
                <h3 class="fw-bold">MEDIATAMA</h3>
                <p>Penerbit buku pendidikan terpercaya di Indonesia.</p>
            </div>

            <div class="col-md-2 mb-4">
                <h6 class="fw-bold">Navigasi</h6>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-light">Beranda</a></li>
                    <li><a href="/produk" class="text-light">Produk</a></li>
                    <li><a href="{{ route('profile') }}" class="text-light">Profil</a></li>
                    <li><a href="{{ route('cabang') }}" class="text-light">Cabang</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-light">Event</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Marketplace</h6>
                <a href="https://shopee.co.id/mediatama_shop51" class="text-light d-block">Shopee</a>
                <a href="https://www.tokopedia.com/mediatama-solo" class="text-light d-block">Tokopedia</a>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Kontak</h6>
                <p>📍 Solo</p>
                <p>📞 021-12345678</p>
            </div>

        </div>

        <hr>
        <div class="text-center pb-3">
            © {{ date('Y') }} Mediatama
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
