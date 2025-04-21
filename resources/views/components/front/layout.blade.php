<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    

    <style>
        /* General */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f4f4f4;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
        }

        nav.scrolled {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.5rem;
            color: #ffffff;
            margin: 0;
            transition: color 0.3s ease;
        }

        nav.scrolled .logo h1 {
            color: #510EFA;
        }

        /* Navbar Links */
        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #ffffff;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 10px;
        }

        nav.scrolled .nav-links a {
            color: #333;
        }

        .nav-links a:hover {
            color: #510EFA;
        }

        /* Button Login & Signup */
        .nav-links .btn-login,
        .nav-links .btn-signup {
            background: #510EFA;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .nav-links .btn-login:hover,
        .nav-links .btn-signup:hover {
            background: #3e0bbf;
            transform: scale(1.05);
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .hamburger div {
            width: 30px;
            height: 3px;
            background: white;
            transition: all 0.3s ease;
        }

        nav.scrolled .hamburger div {
            background: #333;
        }

        /* Mobile Menu */
        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 60px;
            /* Pastikan tidak ketutup navbar */
            right: -100%;
            width: 250px;
            height: calc(100vh - 60px);
            /* Supaya nggak nutup navbar */
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            transition: right 0.3s ease-in-out;
            z-index: 1100;
            /* Pastikan lebih tinggi dari navbar */
            overflow-y: auto;
            /* Kalau menu panjang, bisa discroll */
        }

        .mobile-menu a {
            text-decoration: none;
            color: #333;
            font-size: 1.2rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .mobile-menu a:hover {
            color: #510EFA;
        }

        .mobile-menu .btn-login,
        .mobile-menu .btn-signup {
            background: #510EFA;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .mobile-menu .btn-login:hover,
        .mobile-menu .btn-signup:hover {
            background: #3e0bbf;
            transform: scale(1.05);
        }

        /* Active Menu */
        .mobile-menu.active {
            right: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hamburger {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav id="navbar">
        <div class="logo">
            <img src="{{ asset('assets/images/logo/smk.png') }}" alt="smk">
            <h1>Digital Library</h1>
        </div>

        <div class="nav-links">
            <a href="/">Beranda</a>
            <a href="/book">Koleksi</a>
            <a href="/about">Tentang Kami</a>
            <a href="#" class="btn-login">Login</a>
            <a href="#" class="btn-signup">Daftar</a>
        </div>

        <!-- Hamburger Menu -->
        <div class="hamburger" id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="#">Beranda</a>
        <a href="#">Koleksi</a>
        <a href="#">Tentang Kami</a>
        <a href="#" class="btn-login">Login</a>
        <a href="#" class="btn-signup">Daftar</a>
    </div>

    <!-- Konten utama -->
    <main class="container">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Digital Library SMK Al Hafidz. All rights reserved.</p>
    </footer>

    <script>
        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Hamburger Menu
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');

            // Animasi hamburger menjadi "X"
            const bars = hamburger.children;
            if (mobileMenu.classList.contains('active')) {
                bars[0].style.transform = "translateY(8px) rotate(45deg)";
                bars[1].style.opacity = "0";
                bars[2].style.transform = "translateY(-8px) rotate(-45deg)";
            } else {
                bars[0].style.transform = "none";
                bars[1].style.opacity = "1";
                bars[2].style.transform = "none";
            }
        });
    </script>
</body>

</html>
