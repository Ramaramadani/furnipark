<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderReportController extends Controller
{
    private $apiUrl = 'http://127.0.0.1:8080/api/orders/';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $orders = $response->json();

        return view('laporan.penjualan', compact('orders'));
    }

    public function exportExcel()
    {
        $response = Http::get($this->apiUrl);
        $orders = $response->json();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Penjualan');

        $sheet->fromArray([
            ['No', 'Produk', 'Harga', 'Nama Pembeli', 'Alamat', 'Metode Pembayaran', 'Pengiriman', 'Status', 'Waktu']
        ], NULL, 'A1');

        $row = 2;
        foreach ($orders as $index => $order) {
            $sheet->fromArray([
                $index + 1,
                $order['nama_produk'],
                $order['harga'],
                $order['nama'],
                $order['alamat'],
                $order['metode_pembayaran'],
                $order['shipping_info'],
                $order['status_pesanan'],
                $order['waktu_pembelian'],
            ], NULL, 'A' . $row++);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'laporan_penjualan.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName);
    }

    public function exportPDF()
    {
        $response = Http::get($this->apiUrl);
        $orders = $response->json();

        $pdf = Pdf::loadView('laporan.pdf', compact('orders'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
