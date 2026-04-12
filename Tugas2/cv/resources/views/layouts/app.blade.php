<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <header>
        <div class="logo">MyPortfolio</div>

        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/portofolio">Portofolio</a>
            <a href="/contact">Contact</a>

            <button onclick="darkMode()">
                <i class="fa-solid fa-moon"></i>
            </button>
        </nav>
    </header>

    <div id="content">
        @yield('content')
    </div>

    <script src="{{ asset('script.js') }}"></script>

</body>

</html>
