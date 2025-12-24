@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">Konfirmasi DP Pesanan</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Nama Pemesan:</strong> (via WhatsApp)</p>
            <p><strong>Total Belanja:</strong> Rp {{ number_format($total,0,',','.') }}</p>
            <p class="text-danger">
                <strong>DP (50%):</strong> Rp {{ number_format($dp,0,',','.') }}
            </p>
            <p><strong>Status:</strong>
                <span class="badge bg-warning">Menunggu Konfirmasi DP</span>
            </p>

            <hr>

            <form action="{{ route('admin.dp.approve') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">
                ✔ Konfirmasi DP
            </button>
        </form>
            
        </div>
    </div>
</div>
@endsection
