<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Metode</th>
                <th>Pengiriman</th>
                <th>Status</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order['nama_produk'] }}</td>
                <td>Rp{{ number_format($order['harga'], 2, ',', '.') }}</td>
                <td>{{ $order['nama'] }}</td>
                <td>{{ $order['alamat'] }}</td>
                <td>{{ $order['metode_pembayaran'] }}</td>
                <td>{{ $order['shipping_info'] }}</td>
                <td>{{ $order['status_pesanan'] }}</td>
                <td>{{ date('d-m-Y H:i', strtotime($order['waktu_pembelian'])) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
