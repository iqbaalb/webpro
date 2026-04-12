
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/contact', function () {
    return view('contact');
});
