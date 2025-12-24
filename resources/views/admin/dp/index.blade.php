@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">📋 Daftar Konfirmasi DP</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dp->customer_name ?? 'Via WhatsApp' }}</td>
                            <td>Rp {{ number_format($dp->total_amount,0,',','.') }}</td>
                            <td class="text-danger fw-bold">
                                Rp {{ number_format($dp->dp_amount,0,',','.') }}
                            </td>
                            <td>
                                @if($dp->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-success">Confirmed</span>
                                @endif
                            </td>
                            <td>
                                @if($dp->status === 'pending')
                                   <form action="{{ route('admin.dp.confirm', $dp->id) }}" method="POST">
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
                            <td colspan="6" class="text-center text-muted">
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
