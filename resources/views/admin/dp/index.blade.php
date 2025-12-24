@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">📋 Daftar Konfirmasi DP</h3>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>ID Order</th> {{-- ✅ ID ORDER --}}
                        <th>Customer</th>
                        <th>Total Belanja</th>
                        <th>DP (50%)</th>
                        <th>Status</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($dpList as $dp)
                        <tr>
                            {{-- NO --}}
                            <td>{{ $loop->iteration }}</td>

                            {{-- ID ORDER --}}
                            <td>
                                <span class="badge bg-secondary">
                                    ORD-{{ str_pad($dp->id, 5, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            {{-- CUSTOMER --}}
                            <td>
                                {{ $dp->customer_name ?? 'Via WhatsApp' }}
                            </td>

                            {{-- TOTAL --}}
                            <td>
                                Rp {{ number_format($dp->total_amount,0,',','.') }}
                            </td>

                            {{-- DP --}}
                            <td class="text-danger fw-bold">
                                Rp {{ number_format($dp->dp_amount,0,',','.') }}
                            </td>

                            {{-- STATUS --}}
                            <td>
                                @if($dp->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($dp->status === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($dp->status) }}
                                    </span>
                                @endif
                            </td>

                            {{-- AKSI --}}
                            <td>
                                @if($dp->status === 'pending')
                                    <form action="{{ route('admin.dp.confirm', $dp->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Konfirmasi DP untuk order ini?')">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            ✔ Konfirmasi DP
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
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
