@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">📄 Laporan Transaksi DP</h3>

    <a href="{{ route('admin.laporan.transaksi.pdf') }}"
       class="btn btn-danger mb-3">
        ⬇ Export PDF
    </a>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>ID Order</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>DP</th>
                        <th>Status</th>
                        <th>Tanggal & Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $i => $d)
                        <tr>
                            <td>{{ $i + 1 }}</td>

                            {{-- ID ORDER --}}
                            <td>
                                <span class="badge bg-secondary">
                                    ORD-{{ str_pad($d->id, 5, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            {{-- CUSTOMER --}}
                            <td>
                                {{ $d->customer_name ?? 'Via WhatsApp' }}
                            </td>

                            {{-- TOTAL --}}
                            <td>
                                Rp {{ number_format($d->total_amount,0,',','.') }}
                            </td>

                            {{-- DP --}}
                            <td class="text-danger fw-bold">
                                Rp {{ number_format($d->dp_amount,0,',','.') }}
                            </td>

                            {{-- STATUS --}}
                            <td>
                                @if($d->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($d->status === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($d->status === 'paid')
                                    <span class="badge bg-primary">Lunas</span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($d->status) }}
                                    </span>
                                @endif
                            </td>

                            {{-- TANGGAL + JAM --}}
                            <td>
                                {{ $d->created_at->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
