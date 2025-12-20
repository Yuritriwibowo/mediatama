@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h3 class="fw-bold mb-0">📚 Manajemen Produk</h3>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
                class="btn btn-outline-danger"
                onclick="return confirm('Yakin ingin logout?')">
            🚪 Logout
        </button>
    </form>

</div>


    {{-- BUTTON PRODUK & EVENT --}}
    <div class="d-flex gap-2 mb-4">

        {{-- Tambah Produk --}}
        <a href="{{ route('admin.products.create') }}" 
           class="btn btn-danger px-4 py-2"
           style="border-radius: 12px;">
           + Tambah Produk
        </a>

        {{-- Kelola Event --}}
        <a href="{{ route('admin.events.index') }}" 
           class="btn btn-outline-danger px-4 py-2"
           style="border-radius: 12px; font-weight:600;">
           📅 Kelola Event
        </a>

    </div>


    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success shadow-sm rounded-3">
            {{ session('success') }}
        </div>
    @endif


    {{-- =============== STYLE MODERN =============== --}}
    <style>
        .table-modern {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .img-thumb {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .badge-category {
            background: #d6002a;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
        }

        .btn-action {
            border-radius: 10px !important;
            padding: 6px 14px;
        }
    </style>


    {{-- TABLE MODERN --}}
    <div class="table-modern">

        <table class="table align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th width="120">Gambar</th>
                    <th>Judul</th>
                    <th width="150">Kategori</th>
                    <th width="150">Harga</th>
                    <th width="200" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($products as $p)
                    <tr>

                        {{-- GAMBAR --}}
                        <td>
                            @php
                                $imagePath = ltrim($p->image, '/');
                            @endphp

                            @if ($p->image)
                                <img src="{{ asset($imagePath) }}" 
                                     class="img-thumb shadow-sm">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>

                        {{-- JUDUL --}}
                        <td class="fw-semibold">{{ $p->title }}</td>

                        {{-- KATEGORI --}}
                        <td>
                            <span class="badge-category text-white">
                                {{ $p->category }}
                            </span>
                        </td>

                        {{-- HARGA --}}
                        <td class="fw-bold text-danger">
                            Rp {{ number_format($p->price, 0, ',', '.') }}
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.products.edit', $p->id) }}"
                               class="btn btn-warning btn-action me-2">
                                ✏ Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.products.delete', $p->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                        class="btn btn-danger btn-action">
                                    🗑 Hapus
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
    </div>


    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>

</div>
@endsection
