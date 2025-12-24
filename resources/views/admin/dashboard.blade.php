@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h2 class="fw-bold mb-4">📊 Dashboard Admin</h2>

    {{-- ================= STATISTIK ================= --}}
    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Produk</h6>
                    <h3 class="fw-bold">{{ $totalProduk }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Event</h6>
                    <h3 class="fw-bold">{{ $totalEvent }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">DP Pending</h6>
                    <h3 class="fw-bold text-warning">{{ $dpPending }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">DP Confirmed</h6>
                    <h3 class="fw-bold text-success">{{ $dpConfirmed }}</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- ================= AKTIVITAS TERBARU ================= --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">🔔 DP Terbaru</h5>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>DP</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestDp as $dp)
                        <tr>
                            <td>{{ $dp->customer_name ?? 'Via WhatsApp' }}</td>
                            <td>Rp {{ number_format($dp->total_price, 0, ',', '.') }}</td>
                            <td class="text-danger fw-bold">
                                Rp {{ number_format($dp->dp_amount, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($dp->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-success">Confirmed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada data DP.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    

</div>
@endsection
