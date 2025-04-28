<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library SMK Al Hafidz</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <div class="navbar bg-white shadow-md sticky top-0 z-50">
        <div class="navbar-start">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ asset('assets/images/logo/smk.png') }}" alt="Logo SMK" class="h-10 w-10 mr-3">
                <span class="text-xl font-bold text-blue-700">Digital Library</span>
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('dashboard') }}" class="hover:text-blue-600">Beranda</a></li>
                <li><a href="{{ route('book') }}" class="hover:text-blue-600">Buku</a></li>
                <li><a href="{{ route('peminjaman') }}" class="hover:text-blue-600">Pinjamanku</a></li>
                <li><a href="{{ route('profile.edit') }}" class="hover:text-blue-600">Profil</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-error btn-sm">Logout</button>
            </form>
        </div>
    </div>

    <!-- Header -->
    <section class="text-center mt-20 mb-8 px-4">
        <h1 class="text-4xl font-bold text-blue-700">Koleksi Buku</h1>
        <p class="text-gray-500 mt-2">Temukan dan pinjam buku favorit Anda secara online</p>
    </section>

    <!-- Book Grid -->
    <div class="container mx-auto px-6 mb-16">
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($bukus as $buku)
                <div class="card bg-white shadow-md hover:shadow-xl transition rounded-xl">
                    <figure>
                        <img src="{{ Storage::url($buku->cover) }}" alt="{{ $buku->judul }}" class="h-60 w-full object-cover rounded-t-xl">
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title text-blue-700 text-lg">{{ Str::limit($buku->judul, 40) }}</h2>
                        <p class="text-sm text-gray-500">{{ Str::limit($buku->penulis, 30) }}</p>
                        <p class="text-sm font-semibold text-gray-600 mt-2">
                            Kategori: {{ $buku->kategori->nama_kategori ?? '-' }}
                        </p>
                        <div class="badge badge-success mt-2">Stok: {{ $buku->stok_buku }}</div>

                        <div class="card-actions justify-end mt-4">
                            @if($buku->stok_buku > 0 && !$buku->status_pinjaman)
                                <button class="btn btn-primary btn-sm" onclick="openModal({{ $buku->id }}, '{{ $buku->judul }}', '{{ $buku->penulis }}')">Pinjam</button>
                            @endif
                            @if($buku->status_pinjaman)
                                <form action="{{ route('pengembalian', $buku->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-error btn-sm">Kembalikan</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Belum ada buku tersedia.</p>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    <div id="pinjamModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-96">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Form Peminjaman Buku</h2>
                <button onclick="closeModal()" class="text-2xl leading-none">&times;</button>
            </div>
            <form id="loanForm" method="POST" action="{{ route('peminjaman') }}">
                @csrf
                <input type="hidden" name="buku_id" id="buku_id">
                <div class="mb-2">
                    <p id="modalJudul" class="font-semibold"></p>
                    <p id="modalPenulis" class="text-gray-500"></p>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_kembali" class="input input-bordered w-full" required>
                </div>
                <button type="submit" class="btn btn-primary w-full">Konfirmasi</button>
            </form>
        </div>
    </div>

    <!-- Modal Scripts -->
    <script>
        function openModal(id, title, author) {
            document.getElementById('buku_id').value = id;
            document.getElementById('modalJudul').textContent = `Judul: ${title}`;
            document.getElementById('modalPenulis').textContent = `Penulis: ${author}`;
            document.getElementById('pinjamModal').classList.remove('hidden');
            document.getElementById('pinjamModal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('pinjamModal').classList.add('hidden');
            document.getElementById('pinjamModal').classList.remove('flex');
        }
    </script>

</body>
</html>
