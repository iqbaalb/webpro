<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MahasiswaController::class, 'index'])->name('home');

Route::get('/get-mahasiswa', [MahasiswaController::class, 'getData'])->name('get.mahasiswa');
