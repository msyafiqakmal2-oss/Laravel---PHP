<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Laravel Student System')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 50px;

            background: #0b1220;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .logo span {
            color: #60a5fa;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            font-size: 14px;
            color: #9ca3af;
            transition: 0.3s ease;
        }

        .nav-links a:hover {
            color: white;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 70px 30px;
        }

        /* =========================
           ANIMATION
        ========================= */

        .fade-up {
            animation: fadeUp 0.7s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 0 20px;
            }

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .container {
                padding: 40px 20px;
            }
        }
    </style>

    @yield('style')
</head>

<body>

    <nav class="navbar">

        <a href="/mahasiswa" class="logo">
            LARAVEL<span>.</span>
        </a>

        <div class="nav-links">
            <a href="/mahasiswa">Mahasiswa</a>
            <a href="/mahasiswa/create">Tambah Data</a>
        </div>

    </nav>

    <main>
        @yield('content')
    </main>

    @yield('script')

</body>
</html>