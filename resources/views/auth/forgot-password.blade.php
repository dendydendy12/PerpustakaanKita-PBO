<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lupa Kata Sandi - Perpustakaan Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-base-200">

  <div class="w-full max-w-sm p-6 bg-white shadow-lg rounded-2xl">
    <div class="mb-6 text-center">
      <h1 class="text-3xl font-bold text-primary">Lupa Kata Sandi</h1>
      <p class="text-sm text-gray-500">Masukkan email untuk mengatur ulang kata sandi kamu.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
      <div class="mb-4 text-sm text-green-600">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="mb-4 form-control">
        <label class="label" for="email">
          <span class="label-text">Email</span>
        </label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full input input-bordered" required autofocus />
        @error('email')
          <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="w-full btn btn-primary">
        Kirim Link Reset Kata Sandi
      </button>

      <p class="mt-4 text-sm text-center">
        Ingat kata sandi? <a href="{{ route('login') }}" class="link link-primary">Masuk sekarang</a>
      </p>
    </form>
  </div>

</body>
</html>
