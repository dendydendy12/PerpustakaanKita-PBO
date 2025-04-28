<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - PerpustakaanKita</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            height: 45px;
            margin-right: 12px;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-blue-50 via-white to-blue-100 min-h-screen text-gray-800">

    <!-- Navbar -->
    <div class="navbar bg-white shadow-md px-6 fixed top-0 z-50">
        <div class="navbar-start">
            <div class="flex items-center">
                <img src="{{ asset('assets/images/logo/smk.png') }}" alt="smk" class="h-10 mr-2">
                <h1 class="text-2xl font-bold text-blue-700">Digital Library</h1>
            </div>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 text-gray-700 font-semibold">
                <li><a class="hover:text-blue-500" href="{{ route('book') }}">Buku</a></li>
                <li><a class="hover:text-blue-500" href="{{ route('peminjaman') }}">Pinjamanku</a></li>
                <li><a class="hover:text-blue-500" href="{{ route('profile.edit') }}">Profil</a></li>
            </ul>
        </div>
        <div class="navbar-end space-x-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-error">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-28 px-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-bold text-blue-800 mb-10">Halo, {{ Auth::user()->name }} 👋</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card Buku -->
                <div class="card bg-gradient-to-br from-white to-blue-100 p-6 rounded-2xl shadow-lg" data-aos="fade-up">
                    <h2 class="text-xl font-bold text-blue-700 mb-2">Buku Tersedia</h2>
                    <p class="mb-4 text-gray-600">Lihat semua koleksi buku terbaru di perpustakaan ini.</p>
                    <a href="{{ route('book') }}" class="btn btn-primary w-full">Lihat Buku</a>
                </div>

                <!-- Card Peminjaman -->
                <div class="card bg-gradient-to-br from-white to-blue-100 p-6 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-xl font-bold text-blue-700 mb-2">Peminjaman Saya</h2>
                    <p class="mb-4 text-gray-600">Kelola buku yang sedang kamu pinjam dan lihat riwayatnya.</p>
                    <a href="{{ route('peminjaman') }}" class="btn btn-primary w-full">Lihat Peminjaman</a>
                </div>

                <!-- Card Profil -->
                <div class="card bg-gradient-to-br from-white to-blue-100 p-6 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-xl font-bold text-blue-700 mb-2">Edit Profil</h2>
                    <p class="mb-4 text-gray-600">Perbarui informasi akunmu kapan saja.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary w-full">Edit Profil</a>
                </div>

                <!-- Card Kategori Buku -->
                <div class="card bg-gradient-to-br from-white to-blue-100 p-6 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="text-xl font-bold text-blue-700 mb-4">Kategori Buku</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Fiksi</li>
                        <li>Non-Fiksi</li>
                        <li>Teknologi</li>
                        <li>Sejarah</li>
                        <li>Novel Remaja</li>
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('book') }}" class="btn btn-outline btn-primary w-full">Jelajahi Kategori</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-center p-6 bg-blue-700 text-white mt-16">
        <aside>
            <p>© 2025 PerpustakaanKita. All rights reserved.</p>
        </aside>
    </footer>

    <!-- Script AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000
        });
    </script>
</body>
</html>
