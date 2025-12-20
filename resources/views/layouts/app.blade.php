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

    /* ===== LOGO MEDIATAMA ===== */
    .logo-brand {
        text-decoration: none;
    }

    .logo-icon {
        width: 38px;
        height: 38px;
        background: linear-gradient(135deg, #ffffff, #ffd6de);
        color: #d6002a;
        font-weight: 800;
        font-size: 18px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    }

    .logo-text {
        color: #ffffff;
        font-weight: 700;
        font-size: 20px;
        letter-spacing: 1px;
    }

    .logo-brand:hover .logo-icon {
        transform: scale(1.05);
        transition: 0.3s;
    }

    /* ===== PAGE LOADER ===== */#page-loader {
    position: fixed;
    inset: 0;
    background: rgba(255,255,255,0.9);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
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

        <a class="navbar-brand d-flex align-items-center gap-2 logo-brand" href="/">
        <span class="logo-icon">M</span>
        <span class="logo-text">Mediatama</span>
        </a>


        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            ☰
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a href="/" class="nav-link text-white">Beranda</a></li>
                <li class="nav-item"><a href="/produk" class="nav-link text-white">Produk</a></li>

                <li class="nav-item dropdown">



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
<!-- PAGE LOADER -->
<div id="page-loader">
    <div class="spinner-border text-danger" role="status"></div>
</div>
<script>
document.querySelectorAll('a.nav-link').forEach(link => {
    link.addEventListener('click', function () {
        document.getElementById('page-loader').style.display = 'flex';
    });
});
</script>
<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastSuccess" class="toast align-items-center text-bg-success border-0"
         role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
<!-- TOAST ADD TO CART -->
@if(session('added'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastAdded" class="toast text-bg-success border-0 show"
         role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                ✅ <strong>{{ session('added') }}</strong> berhasil ditambahkan ke keranjang
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
@endif
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
