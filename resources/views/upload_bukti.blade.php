@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4">📤 Upload Bukti Transfer</h3>

    <div class="card p-4 shadow-sm rounded-4">

        <p class="mb-3">
            Silakan upload bukti transfer sesuai dengan total pembayaran / DP.
        </p>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Bukti Transfer</label>
                <input type="file" class="form-control" required>
            </div>

            <button class="btn btn-danger">
                Kirim Bukti Transfer
            </button>
        </form>

    </div>
</div>
@endsection
