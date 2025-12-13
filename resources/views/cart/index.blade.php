@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">🛒 Keranjang Belanja</h3>

    {{-- Jika kosong --}}
    @if(count($cart) == 0)
        <div class="alert alert-info p-4 rounded shadow-sm">
            Keranjang masih kosong.  
            <br><br>
            <a href="/produk" class="btn btn-danger px-4">Lihat Produk</a>
        </div>

    @else
    
    {{-- STYLE MODERN --}}
    <style>
        .cart-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        .qty-btn {
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
            background: #d6002a;
            color: white;
            transition: 0.2s;
        }
        .qty-btn:hover {
            background: #b40022;
        }
        .remove-btn {
            border-radius: 8px;
        }
        .total-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 18px;
            box-shadow: inset 0 0 8px rgba(0,0,0,0.05);
        }
    </style>

    <div class="row">

        {{-- ============================
             LIST ITEM KERANJANG
        ============================ --}}
        <div class="col-md-8">
            
            <div class="cart-card mb-4">

                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th width="140" class="text-center">Qty</th>
                            <th width="150">Harga</th>
                            <th width="100">Hapus</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0; @endphp

                        @foreach ($cart as $id => $item)

                            @php
                                $sub = $item['price'] * $item['qty'];
                                $total += $sub;
                            @endphp

                            <tr>
                                {{-- Judul & kategori --}}
                                <td>
                                    <strong>{{ $item['title'] }}</strong><br>
                                    <small class="text-muted">{{ $item['category'] }}</small>
                                </td>

                                {{-- QTY --}}
                                <td class="text-center">

                                    <form action="{{ route('cart.decrease', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="qty-btn">−</button>
                                    </form>

                                    <span class="mx-2 fw-bold">{{ $item['qty'] }}</span>

                                    <form action="{{ route('cart.increase', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="qty-btn">+</button>
                                    </form>

                                </td>

                                {{-- Harga --}}
                                <td class="fw-bold text-danger">
                                    Rp {{ number_format($sub, 0, ',', '.') }}
                                </td>

                                {{-- Hapus --}}
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger remove-btn">
                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        {{-- ============================
             RINGKASAN TOTAL
        ============================ --}}
        <div class="col-md-4">

            <div class="total-box mb-4">

                <h5 class="fw-bold">Total Pembayaran</h5>

                <div class="d-flex justify-content-between mt-2">
                    <span>Total:</span>
                    <span class="fw-bold text-danger">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>

                <a href="{{ route('cart.checkout') }}"
                   class="btn btn-success w-100 mt-3 py-2"
                   style="border-radius: 10px;">
                    💬 Checkout via WhatsApp
                </a>

            </div>

        </div>

    </div>

    @endif
</div>
@endsection
