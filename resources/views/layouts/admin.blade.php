<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Mediatama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #8b001c, #b30024);
            color: #fff;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar h4 {
            font-weight: bold;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 10px;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,0.2);
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

{{-- ================= SIDEBAR ================= --}}
<div class="sidebar p-4">
    <h4 class="mb-4">MEDIATAMA</h4>
    <small class="text-light d-block mb-4">Admin Panel</small>

    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('admin.products') }}"
       class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
        📦 Kelola Produk
    </a>

    <a href="{{ route('admin.events.index') }}"
       class="{{ request()->routeIs('admin.events*') ? 'active' : '' }}">
        📅 Kelola Event
    </a>

    <a href="{{ route('admin.dp.index') }}"
       class="{{ request()->routeIs('admin.dp*') ? 'active' : '' }}">
        💳 Konfirmasi DP
    </a>

    <hr class="text-white">

    <a href="#"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        🚪 Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

{{-- ================= CONTENT ================= --}}
<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
