<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8080/api/contact/');
            if ($response->successful()) {
                $contacts = $response->json();
                return view('contacts.index', compact('contacts'));
            } else {
                return view('contacts.index', ['contacts' => [], 'error' => 'Gagal mengambil data']);
            }
        } catch (\Exception $e) {
            return view('contacts.index', ['contacts' => [], 'error' => $e->getMessage()]);
        }
    }
}
