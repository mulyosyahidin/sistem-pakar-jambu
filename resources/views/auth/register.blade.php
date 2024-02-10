<!doctype html>
<html data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">

    <title>Daftar</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/utility.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">

    @vite(['resources/js/app.js'])
</head>
<body>
<div class="row g-0 justify-content-center gradient-bottom-right start-purple middle-indigo end-pink">
    <div
        class="col-md-6 col-lg-5 col-xl-5 position-fixed start-0 top-0 vh-100 overflow-y-hidden d-none d-lg-flex flex-lg-column">
        <div class="p-12 py-xl-10 px-xl-20">
            <a class="d-block" href="{{ route('home') }}">
                <img src="{{ asset('assets/themes/satoshi/img/logo-light.svg') }}" class="h-rem-10" alt="...">
            </a>
            <div class="mt-16">
                <h1 class="ls-tight fw-bolder display-6 text-white mb-5">
                    Selamat Datang di Sistem Pakar Diagnosa Hama Tanaman Jambu
                </h1>
                <p class="text-white text-opacity-75 pe-xl-24">
                    Login untuk melakukan diagnosa secara mandiri.
                </p>
            </div>

            @if(session()->has('status'))
                <div class="text-success mt-3">
                    {{ session()->get('status') }}
                </div>
            @endif
        </div>
        <div class="mt-auto ps-16 ps-xl-20">
            <img src="{{ asset('assets/themes/satoshi/img/marketing/shot-1.png') }}"
                 class="img-fluid rounded-top-start-4" alt="...">
        </div>
    </div>
    <div
        class="col-12 col-md-12 col-lg-7 offset-lg-5 min-vh-100 overflow-y-auto d-flex flex-column justify-content-center position-relative bg-body rounded-top-start-lg-4 border-start-lg shadow-soft-5">
        <div class="w-md-50 mx-auto px-10 px-md-0 py-10">
            <div class="mb-10">
                <a class="d-inline-block d-lg-none mb-10" href="{{ route('home') }}">
                    <img src="{{ asset('assets/themes/satoshi/img/logo-dark.svg') }}" class="h-rem-10" alt="...">
                </a>
                <h1 class="ls-tight fw-bolder h3">Daftar</h1>
                <div class="mt-3 text-sm text-muted">
                    <span>Sudah punya akun?</span> <a href="{{ route('login') }}" class="fw-semibold">Login
                        disini</a>
                </div>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="name"
                           name="name" value="{{ old('name') }}" required>

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" value="{{ old('email') }}" required>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-between gap-2 mb-2 align-items-center">
                        <label class="form-label mb-0" for="password">Password</label>
                    </div>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" autocomplete="current-password" required>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-5">
                    <div class="d-flex justify-content-between gap-2 mb-2 align-items-center">
                        <label class="form-label mb-0" for="password">Password</label>
                    </div>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" autocomplete="current-password" required>

                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="Daftar" class="btn btn-dark w-100">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
