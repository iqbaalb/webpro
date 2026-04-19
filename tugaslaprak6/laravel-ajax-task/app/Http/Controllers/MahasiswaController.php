<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        return view('mahasiswa.index');
    }

    // Mengambil data dari file JSON dan mengembalikan sebagai JSON response
    public function getData()
    {
        $path = public_path('data/mahasiswa.json');

        if (File::exists($path)) {
            $jsonString = File::get($path);
            $data = json_decode($jsonString, true);
            return response()->json($data);
        }

        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }
}
