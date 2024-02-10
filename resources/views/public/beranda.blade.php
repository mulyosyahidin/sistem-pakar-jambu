<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">

    <title>Selamat Datang di Website Sistem Pakar Diagnosa Penyakit Jambu</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/utility.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">

    @vite(['resources/js/app.js'])

    <style>
        @media (min-width: 992px) {
            .mt-150 {
                margin-top: 120px;
            }
        }
    </style>
</head>
<body class="p-1 p-lg-2">
<div class="overflow-x-hidden rounded-top-4 pt-2 pt-lg-4">
    <header>
        <div
                class="w-lg-75 mx-2 mx-lg-auto position-relative z-2 px-lg-3 py-1 shadow-5 rounded-3 rounded-lg-pill bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark p-0" id="navbar">
                <div class="container px-sm-0">
                    <a class="navbar-brand d-inline-block w-lg-64" href="#">
                        <img src="{{ asset('assets/themes/satoshi/img/logo-light.svg') }}" class="h-rem-10" alt="...">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav gap-2 mx-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link rounded-pill" href="{{ route('home') }}"
                                   aria-current="page">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill" href="">Hama</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill" href="">Gejala</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill" href="">Profil</a>
                            </li>
                        </ul>
                        <div class="navbar-nav align-items-lg-center justify-content-end gap-2 ms-lg-4 w-lg-64">
                            @if(auth()->check())
                                <a href="{{ getDashboardUrl() }}"
                                   class="btn btn-sm btn-white border-0 rounded-lg-pill w-100 w-lg-auto mb-4 mb-lg-0">Dashboard</a>
                            @else
                                <a class="nav-item nav-link rounded-pill d-none d-lg-block" href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}"
                                   class="btn btn-sm btn-white border-0 rounded-lg-pill w-100 w-lg-auto mb-4 mb-lg-0">Daftar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div
                class="pt-56 pb-10 pt-lg-56 pb-lg-0 mt-n40 position-relative gradient-bottom-right start-indigo middle-purple end-yellow">
            <div class="container">
                <div class="row align-items-center g-10">
                    <div class="col-lg-8">
                        <h1 class="ls-tight fw-bolder display-3 text-white mb-5 mt-150">
                            Selamat Datang
                        </h1>
                        <p class="w-xl-75 lead text-white" style="position: relative">
                            di website Sistem Pakar Diagnosa Hama Tanaman Jambu dengan metode <i>Variable-Centered
                                Intelligent Rule-Based System</i> (VCIRS).
                        </p>
                    </div>
                </div>
                <div class="d-none d-lg-block mt--150" style="margin-top: -120px;"><img
                            src="{{ asset('assets/images/Hero 1.png') }}"></div>
            </div>
        </div>
        <div class="mt-2 py-20 pt-lg-32 bg-dark rounded-bottom-4 overflow-hidden position-relative z-1">
            <div class="container mw-screen-xl">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <h1 class="display-4 font-display text-white fw-bolder lh-tight mb-4">
                            Bagaimana Cara Kerjanya?
                        </h1>
                        <p class="text-lg text-white text-opacity-75">3 langkah mudah menggunakan sistem pakar diagnosa
                            hama tanaman jambu</p>
                    </div>
                </div>
                <div class="row g-6 g-lg-20 my-10">
                    <div class="col-md-4">
                        <div class="card shadow-none border-0">
                            <div class="card-body p-7">
                                <div class="mt-4 mb-7">
                                    <div class="icon icon-shape text-white bg-primary rounded-circle text-lg"><i
                                                class="bi bi-box-arrow-right"></i></div>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5 class="h3 font-display fw-bold mb-3">Daftar dan buat akun</h5>
                                    <p class="text-muted">Mendaftar dan membuat akun menggunakan email Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-none border-0">
                            <div class="card-body p-7">
                                <div class="mt-4 mb-7">
                                    <div class="icon icon-shape text-white bg-primary rounded-circle text-lg"><i
                                                class="bi bi-question-circle"></i></div>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5 class="h3 font-display fw-bold mb-3">Kenali gejala tanaman</h5>
                                    <p class="text-muted">Kenali gejala yang muncul pada jeruk Anda dengan memperhatikan
                                        ciri-ciri fisik yang nampak.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-none border-0">
                            <div class="card-body p-7">
                                <div class="mt-4 mb-7">
                                    <div class="icon icon-shape text-white bg-primary rounded-circle text-lg"><i
                                                class="bi bi-stars"></i></div>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h5 class="h3 font-display fw-bold mb-3">Lakukan diagnosa</h5>
                                    <p class="text-muted">Sistem akan memandu Anda memilih gejala-gejala yang nampak.
                                        Kirim, dan sistem akan memberikan hasil diagnosa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-20 py-lg-20">
            <div class="container mw-screen-xl">
                <div
                        class="py-32 gradient-bottom-right start-gray middle-black end-gray rounded-5 px-lg-16 text-center text-md-start">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8 text-center">
                            <h1 class="ls-tight fw-bolder display-4 mb-5 text-white">Sudah siap?</h1>
                            <p class="lead text-white opacity-8 mb-10">Ayo lakukan diagnosa hama tanaman jambu Anda dan
                                lakukan penanganan dengan tepat.</p>
                            <div class="mx-n2">
                                @if(auth()->check())
                                    <a href="{{ getDashboardUrl() }}"
                                       class="btn btn-lg btn-white mx-2 px-lg-8">Buka Dashboard</a>
                                @else
                                    <a href="{{ route('register') }}"
                                       class="btn btn-lg btn-white mx-2 px-lg-8">Daftar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="pt-24 pb-10">
        <div class="container mw-screen-xl">
            <div class="row">
                <div class="col">
                    <div class="pe-5">
                        <h3 class="h2 text-heading fw-semibold lh-lg mb-3">Sistem Pakar Diagnosa Hama Tanaman Jambu</h3>
                        <a href="#" class="h3 text-primary">#Rahwini Harpa Helda</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="{{ asset('assets/themes/satoshi/js/main.js') }}"></script>

</body>
</html>
