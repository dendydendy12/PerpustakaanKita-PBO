<x-front.layout>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Library SMK Al Hafidz</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'Poppins', sans-serif; background-color: #f5f5f5; color: #333; }
            .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
            .collection-header { text-align: center; padding: 30px; background: #510EFA; color: white; border-radius: 10px; margin-bottom: 20px; }
            .book-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                justify-content: center;
            }
            .book-card {
                background: white;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                transition: transform 0.3s ease;
            }
            .book-card:hover { transform: translateY(-5px); }
            .book-cover {
                height: 250px;
                background-size: cover;
                background-position: center;
                border-radius: 10px;
                margin-bottom: 10px;
                position: relative;
            }
            .stock-badge {
                position: absolute;
                top: 5px;
                right: 5px;
                background: #4CAF50;
                color: white;
                padding: 3px 7px;
                border-radius: 10px;
                font-size: 0.8rem;
            }
            .book-title { font-size: 1rem; color: #510EFA; margin-bottom: 5px; }
            .book-author { font-size: 0.9rem; color: #777; margin-bottom: 10px; }
            .book-category { font-size: 0.85rem; color: #555; margin-bottom: 10px; font-weight: bold; }
            .btn { background: #510EFA; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; transition: background 0.3s ease; }
            .btn:hover { background: #3e0bbf; }
            .modal {
                display: none;
                position: fixed;
                top: 0; left: 0;
                width: 100%; height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }
            .modal-content { background: white; padding: 20px; border-radius: 10px; text-align: center; }
            .close-btn { font-size: 1.5rem; cursor: pointer; }
        </style>
    </head>
    <body>
        <div class="container">
            <section class="collection-header">
                <h1>Digital Library SMK Al Hafidz</h1>
                <p>Temukan dan pinjam buku favorit Anda secara online</p>
            </section>

            <div class="book-grid">
                @forelse ($bukus as $buku)
                <div class="book-card">
                    <div class="book-cover" style="background-image: url('{{ Storage::url($buku->cover) }}')">
                        <span class="stock-badge">Stok: {{ $buku->stok_buku }}</span>
                    </div>
                    <h3 class="book-title">{{ Str::limit($buku->judul, 50) }}</h3>
                    <p class="book-author">{{ Str::limit($buku->penulis, 30) }}</p>
                    <p class="book-category">Kategori: {{ $buku->kategori_id }}</p>
                    @if($buku->stok_buku > 0)
                        <button class="btn" onclick="openModal({{ $buku->id }}, '{{ $buku->judul }}', '{{ $buku->penulis }}')">Pinjam Buku</button>
                    @endif
                    @if($buku->status_pinjaman)
                        <form action="{{ route('pengembalian', $buku->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn" style="background: red;" type="submit">Kembalikan</button>
                        </form>
                    @endif
                </div>
                @empty
                <p>Belum ada buku</p>
                @endforelse
            </div>
        </div>

        <!-- Modal Peminjaman -->
        <div id="pinjamModal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <h2>Form Peminjaman Buku</h2>
                <form id="loanForm" method="POST" action="{{ route('peminjaman') }}">
                    @csrf
                    <input type="hidden" name="buku_id" id="buku_id">
                    <p id="modalJudul"></p>
                    <p id="modalPenulis"></p>
                    <label>Tanggal Pengembalian:</label>
                    <input type="date" name="tanggal_kembali" required>
                    <button class="btn" type="submit">Konfirmasi Peminjaman</button>
                </form>
            </div>
        </div>

        <div class="join">
            <input
              class="join-item btn btn-square"
              type="radio"
              name="options"
              aria-label="1"
              checked="checked" />
            <input class="join-item btn btn-square" type="radio" name="options" aria-label="2" />
            <input class="join-item btn btn-square" type="radio" name="options" aria-label="3" />
            <input class="join-item btn btn-square" type="radio" name="options" aria-label="4" />
          </div>

        <script>
            function openModal(id, title, author) {
                document.getElementById('buku_id').value = id;
                document.getElementById('modalJudul').textContent = `Judul: ${title}`;
                document.getElementById('modalPenulis').textContent = `Penulis: ${author}`;
                document.getElementById('pinjamModal').style.display = 'flex';
            }

            function closeModal() {
                document.getElementById('pinjamModal').style.display = 'none';
            }
        </script>
    </body>
    </html>
</x-front.layout>
