<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:6px; }
        th { background:#eee; }
    </style>
</head>
<body>

<h3 style="text-align:center;">LAPORAN TRANSAKSI DP MEDIATAMA</h3>

<table>
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
            <td>{{ number_format($d->total_amount,0,',','.') }}</td>
            <td>{{ number_format($d->dp_amount,0,',','.') }}</td>
            <td>{{ ucfirst($d->status) }}</td>
            <td>{{ $d->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
