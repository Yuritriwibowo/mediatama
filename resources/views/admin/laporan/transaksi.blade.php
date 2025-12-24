@extends('layouts.admin')

@section('content')
<h3 class="fw-bold mb-4">📄 Laporan Transaksi DP</h3>

<a href="{{ route('admin.laporan.transaksi.pdf') }}"
   class="btn btn-danger mb-3">
   ⬇ Export PDF
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Total</th>
            <th>DP</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->customer_name }}</td>
            <td>Rp {{ number_format($d->total_amount,0,',','.') }}</td>
            <td>Rp {{ number_format($d->dp_amount,0,',','.') }}</td>
            <td>{{ ucfirst($d->status) }}</td>
            <td>{{ $d->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
