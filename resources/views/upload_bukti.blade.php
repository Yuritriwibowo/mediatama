@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">📤 Upload Bukti Transfer</h3>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning rounded-3">
            {{ session('warning') }}
        </div>
    @endif

    <div class="card p-4 shadow-sm rounded-4">

        <p class="mb-3">
            Silakan upload bukti transfer sesuai dengan <strong>DP minimal (50%)</strong>.
            <br>
            Setelah dikirim, admin akan melakukan konfirmasi melalui WhatsApp.
        </p>

        {{-- ⬇️ PAKAI $trx (SESUAI CONTROLLER) --}}
        <form action="{{ route('upload.bukti.store', $trx->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            {{-- NOMINAL --}}
            <div class="mb-3">
                <label class="form-label">Nominal Transfer</label>
                <input type="number"
                       name="nominal"
                       class="form-control"
                       placeholder="Contoh: 150000"
                       required>

                <small class="text-muted">
                    DP minimal:
                    <strong>
                        Rp {{ number_format($trx->total_amount * 0.5, 0, ',', '.') }}
                    </strong>
                </small>
            </div>

            {{-- BUKTI --}}
            <div class="mb-3">
                <label class="form-label">Bukti Transfer</label>
                <input type="file"
                       name="payment_proof"
                       class="form-control"
                       accept="image/*"
                       required>
            </div>

            <button class="btn btn-danger w-100">
                Kirim Bukti Transfer
            </button>
        </form>

        <div class="alert alert-info mt-4 mb-0">
            ⏳ <strong>Status:</strong> Menunggu konfirmasi admin melalui WhatsApp.
        </div>

    </div>
</div>
@endsection
