@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-4">📋 Daftar Konfirmasi DP</h3>

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
                        <th>ID Order</th>
                        <th>Customer</th>
                        <th>Total Belanja</th>
                        <th>DP (50%)</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($dpList as $dp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <span class="badge bg-secondary">
                                ORD-{{ str_pad($dp->id, 5, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            {{ $dp->customer_name ?? 'Via WhatsApp' }}
                        </td>

                        <td>
                            Rp {{ number_format($dp->total_amount,0,',','.') }}
                        </td>

                        <td class="text-danger fw-bold">
                            Rp {{ number_format($dp->dp_amount,0,',','.') }}
                        </td>

                        {{-- BUKTI TRANSFER --}}
                        <td>
                            @if($dp->payment_proof)
                                <button type="button"
                                        class="btn btn-info btn-sm"
                                        onclick="showBukti(
                                            '{{ asset($dp->payment_proof) }}',
                                            '{{ str_pad($dp->id,5,'0',STR_PAD_LEFT) }}'
                                        )">
                                    📷 Bukti
                                </button>
                            @else
                                <span class="text-muted">Belum upload</span>
                            @endif
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if($dp->status === 'nominal_tidak_sesuai')
                                <span class="badge bg-warning text-dark">
                                    Nominal Tidak Sesuai
                                </span>
                            @elseif($dp->status === 'menunggu_konfirmasi_admin')
                                <span class="badge bg-info">
                                    Menunggu Konfirmasi
                                </span>
                            @elseif($dp->status === 'confirmed')
                                <span class="badge bg-success">
                                    Confirmed
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ ucfirst($dp->status) }}
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td>
                            @if(in_array($dp->status, ['pending','menunggu_konfirmasi_admin','nominal_tidak_sesuai']))
                                <form action="{{ route('admin.dp.confirm', $dp->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Konfirmasi DP ini?')">
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
                        <td colspan="8" class="text-center text-muted py-4">
                            Belum ada data DP.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

{{-- MODAL GLOBAL LIHAT BUKTI --}}
<div class="modal fade" id="buktiModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="buktiTitle">Bukti Transfer</h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="buktiImage"
                     src=""
                     class="img-fluid rounded shadow">
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT MODAL --}}
<script>
function showBukti(src, orderId) {
    document.getElementById('buktiImage').src = src;
    document.getElementById('buktiTitle').innerText =
        'Bukti Transfer - ORD-' + orderId;

    let modal = new bootstrap.Modal(
        document.getElementById('buktiModal')
    );
    modal.show();
}
</script>

@endsection
