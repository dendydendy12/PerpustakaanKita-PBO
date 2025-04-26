
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PerpustakaanKita - Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
      .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
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
            color: rgb(9, 9, 164);
            margin: 0;
            font-weight: bold;
            transition: color 0.3s ease;
        }
    </style>
  </head>
  <body class="bg-white text-gray-800">

    <!-- Navbar -->
    <div class="navbar bg-white shadow-md px-6 fixed top-0 z-50">
      <div class="navbar-start">
        <div class="logo">
            <img src="{{ asset('assets/images/logo/smk.png') }}" alt="smk">
            <h1>Digital Library</h1>
        </div>

      </div>
      <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 text-gray-600">
          <li><a class="hover:text-blue-500" href="{{route('home')}}">Beranda</a></li>
          {{-- <li><a class="hover:text-blue-500" href="#fitur">Fitur</a></li> --}}
          <li><a class="hover:text-blue-500" href="{{route ('about')}}">Tentang Kami</a></li>
        </ul>
      </div>
      <div class="navbar-end space-x-2">
        <a href="{{ route('login') }}" class="btn btn-outline btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
      </div>
    </div>

    {{ $slot }}



 <!-- Footer -->
 <footer class="footer footer-center p-6 bg-blue-600 text-white mt-16">
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
