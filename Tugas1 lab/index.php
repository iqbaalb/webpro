<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<head>
    <title>My Portfolio</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <div class="logo">MyPortfolio</div>

        <nav>
            <a onclick="loadPage('pages/about.php')">About</a>
            <a onclick="loadPage('pages/project.php')">Projects</a>
            <a onclick="loadPage('pages/contact.php')">Contact</a>
            <button onclick="darkMode()"><i class="fa-solid fa-moon"></i></button>
        </nav>

    </header>


    <section class="hero">

        <div class="hero-container">

            <div class="hero-photo">
                <img src="https://avatars.githubusercontent.com/u/162214483?s=400&u=dae6a082d365f8118c6fe806c69c52d81b4f0f8c&v=4" alt="Foto Profil">
                <p>Iqbal Bawani</p>
            </div>

            <div class="hero-text">
                <h1>Hello, I'm <span>Web Developer</span></h1>

                <p class="hero-desc">
                    Saya merupakan mahasiswa semester 6 Teknik Informatika Telkom University Purwokerto.
                    Seorang pengembang web yang tertarik dalam membuat website yang
                    modern, responsif, dan interaktif menggunakan HTML, CSS, JavaScript, dan PHP.
                    Saya senang mempelajari teknologi baru serta mengembangkan solusi digital
                    yang dapat membantu memecahkan berbagai permasalahan.
                </p>

                <button onclick="loadPage('pages/project.php')">Lihat Portofolio saya </button>
            </div>

        </div>

    </section>

    <div id="content"></div>


    <script src="ajax.js"></script>
    <script src="script.js"></script>

</body>

</html>