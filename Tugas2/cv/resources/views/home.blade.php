@extends('layouts.app')

@section('content')
    <section class="hero">

        <div class="hero-container">

            <div class="hero-photo text-center">
                <img src="https://avatars.githubusercontent.com/u/162214483?s=400&v=4" alt="Foto Profil">
                <p>Iqbal Bawani</p>
            </div>

            <div class="hero-text text-center">
                <h1>Hello, I'm <span>Web Developer</span></h1>

                <p class="hero-desc">
                    Saya merupakan mahasiswa semester 6 Teknik Informatika Telkom University Purwokerto.
                    Seorang pengembang web yang tertarik dalam membuat website yang
                    modern, responsif, dan interaktif menggunakan HTML, CSS, JavaScript, dan PHP.
                </p>

                <a href="/portofolio" class="btn">
                    Lihat Portofolio saya
                </a>

                <a href="https://github.com/iqbaalb" class="btn">
                    Github Saya
                </a>
            </div>

        </div>

    </section>
@endsection
