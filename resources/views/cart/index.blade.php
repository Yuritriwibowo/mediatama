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
                  <div class="d-flex justify-content-between mt-2">
                    <span>Total:</span>
                    <span                                @php
                    $dp = $total * 0.5;
                    $sisa = $total - $dp;
                @endphp

                <div class="d-flex justify-content-between mt-2">
                    <span>Total Belanja:</span>
                    <span class="fw-bold">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>

                <div class="d-flex justify-content-between mt-2 text-danger">
                    <span>DP (50%):</span>
                    <span class="fw-bold">
                        Rp {{ number_format($dp, 0, ',', '.') }}
                    </span>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <span>Sisa Pembayaran:</span>
                    <span>
                        Rp {{ number_format($sisa, 0, ',', '.') }}
                    </span>
                </div>

                <div class="alert alert-warning mt-3 mb-0">
                    Pembayaran minimal <strong>50%</strong> (DP) wajib dilakukan sebelum barang dikirim.
                </div>
                </div>


                <form id="checkoutForm" action="{{ route('cart.checkout') }}" method="GET">
                <button type="button"
                    onclick="checkoutProcess()"
                    class="btn btn-danger w-100 mb-3">
                    💬 Checkout via WhatsApp
                </button>
                </form>
                
               <script>
                const cartData = @json($cart);
                </script>

                <script>
                function checkoutProcess() {

                    const phone = '628159777660'; // NOMOR WA ADMIN
                    let message = "Halo Admin Mediatama,\n\n";
                    message += "Saya ingin checkout pesanan berikut:\n\n";

                    let total = 0;

                    Object.values(cartData).forEach(item => {
                        const subTotal = item.price * item.qty;
                        total += subTotal;

                        message += `- ${item.title} (Qty: ${item.qty}) - Rp ${subTotal.toLocaleString('id-ID')}\n`;
                    });

                    const dp = total * 0.5;

                    message += "\n-------------------------\n";
                    message += `Total: Rp ${total.toLocaleString('id-ID')}\n`;
                    message += `DP 50%: Rp ${dp.toLocaleString('id-ID')}\n\n`;
                    message += "Terima kasih.";

                    const waUrl = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

                    // 🔹 TAB BARU → WHATSAPP
                    window.open(waUrl, '_blank');

                    // 🔹 TAB LAMA → CHECKOUT (UPLOAD BUKTI)
                    document.getElementById('checkoutForm').submit();
                }
                </script>





            </div>

        </div>

    </div>

    @endif
</div>
@endsection
