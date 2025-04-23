<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar - Perpustakaan Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-base-200">
  <div class="w-full max-w-sm p-6 bg-white shadow-lg rounded-2xl">
    <div class="mb-6 text-center">
      <h1 class="text-3xl font-bold text-primary">Daftar</h1>
      <p class="text-sm text-gray-500">Buat akun baru untuk mengakses Perpustakaan Digital</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-4 form-control">
        <label class="label" for="name">
          <span class="label-text">Nama Lengkap</span>
        </label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" class="input input-bordered" required autofocus />
        @error('name')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4 form-control">
        <label class="label" for="email">
          <span class="label-text">Email</span>
        </label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" class="input input-bordered" required />
        @error('email')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4 form-control">
        <label class="label" for="password">
          <span class="label-text">Kata Sandi</span>
        </label>
        <input type="password" id="password" name="password" placeholder="********" class="input input-bordered" required />
        @error('password')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4 form-control">
        <label class="label" for="password_confirmation">
          <span class="label-text">Konfirmasi Kata Sandi</span>
        </label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********" class="input input-bordered" required />
        @error('password_confirmation')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="w-full btn btn-primary">Daftar</button>

      <p class="mt-4 text-sm text-center">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="link link-primary">Masuk di sini</a>
      </p>
    </form>
  </div>
</body>
</html>
