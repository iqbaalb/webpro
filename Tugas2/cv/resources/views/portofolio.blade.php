@extends('layouts.app')

@section('content')
    <h2>My Projects</h2>

    <div class="project-grid">

        <div class="project-card">
            <img src="{{ asset('adira.PNG') }}" alt="Project 1">
            <h3>Website Toko Online Adira</h3>
            <p>Website e-commerce Adira menggunakan PHP dan MySQL</p>
        </div>

        <div class="project-card">
            <img src="{{ asset('dtadventure.PNG') }}" alt="Project 2">
            <h3>Aplikasi Kasir</h3>
            <p>Aplikasi berbasis web untuk UMKM yang merupakan usaha penyewaan alat gunung</p>
        </div>

        <div class="project-card">
            <img src="{{ asset('giziku.PNG') }}" alt="Project 3">
            <h3>Portfolio Website</h3>
            <p>Website kalkulator Giziku</p>
        </div>

    </div>
@endsection
