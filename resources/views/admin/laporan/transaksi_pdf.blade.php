<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi DP Mediatama</title>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 11px;
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h3>LAPORAN TRANSAKSI DP<br>MEDIATAMA</h3>

<table>
    <thead>
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
        @foreach($data as $i => $d)
            <tr>
                <td>{{ $i + 1 }}</td>

                {{-- ID ORDER --}}
                <td>
                    ORD-{{ str_pad($d->id, 5, '0', STR_PAD_LEFT) }}
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
                <td>
                    Rp {{ number_format($d->dp_amount,0,',','.') }}
                </td>

                {{-- STATUS --}}
                <td>
                    {{ ucfirst($d->status) }}
                </td>

                {{-- TANGGAL + JAM --}}
                <td>
                    {{ $d->created_at->format('d-m-Y H:i') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
