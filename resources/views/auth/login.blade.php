<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masuk - Perpustakaan Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-base-200">
  <div class="w-full max-w-sm p-6 bg-white shadow-lg rounded-2xl">
    <div class="mb-6 text-center">
      <h1 class="text-3xl font-bold text-primary">Masuk</h1>
      <p class="text-sm text-gray-500">Silakan masuk untuk mengakses akunmu</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4 form-control">
        <label class="label" for="email">
          <span class="label-text">Email</span>
        </label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="input input-bordered" required autofocus />
        @error('email')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4 form-control">
        <label class="label" for="password">
          <span class="label-text">Kata Sandi</span>
        </label>
        <input type="password" id="password" name="password" class="input input-bordered" required />
        @error('password')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-4 form-control">
        <label class="cursor-pointer label">
          <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
          <span class="ml-2 label-text">Ingat saya</span>
        </label>
      </div>

      <button type="submit" class="w-full btn btn-primary">Masuk</button>

      <p class="mt-4 text-sm text-center">
        Belum punya akun?
        <a href="{{ route('register') }}" class="link link-primary">Daftar sekarang</a>
      </p>
    </form>
  </div>
</body>
</html>
