<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

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

    public function exportWord()
    {
        $response = Http::get($this->apiUrl);
        $orders = $response->json();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText("Laporan Penjualan", ['bold' => true, 'size' => 16]);
        $table = $section->addTable();

        $table->addRow();
        foreach (['No', 'Produk', 'Harga', 'Nama', 'Alamat', 'Pembayaran', 'Pengiriman', 'Status', 'Waktu'] as $heading) {
            $table->addCell()->addText($heading);
        }

        foreach ($orders as $index => $order) {
            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($order['nama_produk']);
            $table->addCell()->addText($order['harga']);
            $table->addCell()->addText($order['nama']);
            $table->addCell()->addText($order['alamat']);
            $table->addCell()->addText($order['metode_pembayaran']);
            $table->addCell()->addText($order['shipping_info']);
            $table->addCell()->addText($order['status_pesanan']);
            $table->addCell()->addText($order['waktu_pembelian']);
        }

        $fileName = 'laporan_penjualan.docx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName);
    }
}
