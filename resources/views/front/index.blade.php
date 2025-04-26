<x-front.layout>

    <!-- Hero Section -->
    <section class="relative w-full min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('bg.jfif'); margin-top: 4rem;">
      <div class="absolute inset-0 bg-white bg-opacity-80"></div>
      <div class="z-10 text-center max-w-xl px-6" data-aos="fade-up">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di PerpustakaanKita</h1>
        <p class="text-lg mb-6">Akses buku favoritmu dari mana saja. Pesan secara online dan ambil tanpa antre!</p>
        <a href="{{ route('login') }}" class="btn btn-primary transition hover:scale-105 hover:shadow-lg">Mulai Jelajahi</a>
      </div>
    </section>

    <!-- Fitur Unggulan -->
    <section id="fitur" class="py-16 px-6 bg-gray-50">
      <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-3xl font-bold mb-2">Fitur Unggulan</h2>
        <p class="text-gray-500">Nikmati layanan terbaik dari PerpustakaanKita</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <div class="card bg-white p-6 rounded-xl" data-aos="fade-right">
          <h3 class="text-xl font-semibold mb-2">📦 Booking Buku Online</h3>
          <p>Pesan buku dari rumah, ambil dengan mudah di perpustakaan.</p>
        </div>
        <div class="card bg-white p-6 rounded-xl" data-aos="zoom-in">
          <h3 class="text-xl font-semibold mb-2">📋 Riwayat Peminjaman</h3>
          <p>Lacak semua buku yang pernah kamu pinjam, lengkap dengan statusnya.</p>
        </div>
        <div class="card bg-white p-6 rounded-xl" data-aos="fade-left">
          <h3 class="text-xl font-semibold mb-2">🔎 Rekomendasi Buku</h3>
          <p>Dapatkan saran buku menarik dari sistem atau pengunjung lain.</p>
        </div>
      </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang" class="bg-white py-16 px-6">
      <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-4">Kenapa Memilih Kami?</h2>
        <p class="text-gray-600 leading-relaxed">
          PerpustakaanKita hadir untuk memudahkan akses literasi di era digital. Semua proses peminjaman kini lebih praktis, cepat, dan fleksibel.
        </p>
      </div>
    </section>

</x-front.layout>

