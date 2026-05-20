<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#0f766e">

    <title>Selamat Datang di Website Sistem Pakar Hama Tanaman Jambu</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        guava: {
                            leaf: '#0f766e',
                            dark: '#134e4a',
                            soft: '#ccfbf1',
                            fruit: '#f43f5e',
                            cream: '#fff7ed',
                        },
                    },
                    boxShadow: {
                        soft: '0 24px 70px -30px rgba(15, 118, 110, 0.45)',
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
@php
    $stats = [
        ['label' => 'User', 'value' => $count['user'], 'icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z'],
        ['label' => 'Diagnosa', 'value' => $count['diagnosa'], 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5A3.375 3.375 0 0 0 10.125 2.25H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm-1.5 12 2.25 2.25L15 12'],
        ['label' => 'Hama', 'value' => $count['hama'], 'icon' => 'M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.867.966 1.867 2.013 0 3.728-2.386 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.047.83-1.867 1.867-2.013A24.204 24.204 0 0 1 12 12.75Zm0 0c2.485 0 4.5-1.847 4.5-4.125S14.485 4.5 12 4.5 7.5 6.347 7.5 8.625 9.515 12.75 12 12.75Zm6.75-2.25 2.25-2.25m-15.75 2.25L3 8.25m15 7.5 2.25 2.25m-14.25-2.25L3.75 18'],
        ['label' => 'Gejala', 'value' => $count['gejala'], 'icon' => 'M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z'],
    ];

    $steps = [
        [
            'title' => 'Daftar dan buat akun',
            'description' => 'Mendaftar dan membuat akun menggunakan email Anda.',
        ],
        [
            'title' => 'Kenali gejala tanaman',
            'description' => 'Kenali gejala yang muncul pada jambu Anda dengan memperhatikan ciri-ciri fisik yang nampak.',
        ],
        [
            'title' => 'Lakukan diagnosa',
            'description' => 'Sistem akan memandu Anda memilih gejala-gejala yang nampak. Kirim, dan sistem akan memberikan hasil diagnosa.',
        ],
    ];
@endphp

<div class="min-h-screen overflow-hidden">
    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/20 bg-white/85 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-6 lg:px-8" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-full bg-guava-leaf text-white shadow-lg shadow-teal-700/20">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </span>
                <span class="text-lg font-bold tracking-tight text-guava-dark">Pakar Jambu</span>
            </a>

            <div class="flex items-center gap-2">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="rounded-full bg-guava-dark px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-teal-900/20 transition hover:bg-guava-leaf">Dashboard</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="rounded-full bg-guava-dark px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-teal-900/20 transition hover:bg-guava-leaf">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="rounded-full px-4 py-2.5 text-sm font-semibold text-guava-dark transition hover:bg-teal-50">Login</a>
                    <a href="{{ route('register') }}" class="rounded-full bg-guava-dark px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-teal-900/20 transition hover:bg-guava-leaf">Daftar</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <section class="relative isolate bg-guava-cream pt-28 sm:pt-32 lg:pt-36">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(20,184,166,0.18),_transparent_34%),linear-gradient(135deg,_rgba(255,255,255,0.92),_rgba(240,253,250,0.76))]"></div>
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 pb-16 sm:px-6 lg:grid-cols-[1fr_0.92fr] lg:px-8 lg:pb-24">
                <div class="max-w-3xl">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-teal-200 bg-white/80 px-4 py-2 text-sm font-semibold text-guava-dark shadow-sm">
                        <span class="h-2 w-2 rounded-full bg-guava-fruit"></span>
                        Sistem Pakar Diagnosa Hama Tanaman Jambu
                    </div>
                    <h1 class="text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl lg:text-6xl">
                        Selamat Datang
                    </h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600 sm:text-xl">
                        Sistem Pakar Diagnosa Hama Tanaman Jambu Berbasis Web Menggunakan Metode VCIRS
                    </p>

                    <div class="mt-9 flex flex-wrap gap-3">
                        @auth
                            @if(auth()->user()->role == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-guava-leaf px-7 py-3.5 text-base font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-guava-dark">
                                    Dashboard
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-guava-leaf px-7 py-3.5 text-base font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-guava-dark">
                                    Dashboard
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-guava-leaf px-7 py-3.5 text-base font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-guava-dark">Login</a>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full border border-teal-200 bg-white px-7 py-3.5 text-base font-bold text-guava-dark shadow-sm transition hover:-translate-y-0.5 hover:border-guava-leaf hover:bg-teal-50">Daftar</a>
                        @endauth
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-xl lg:max-w-none">
                    <div class="absolute -left-5 top-10 h-24 w-24 rounded-full bg-rose-200/70 blur-2xl"></div>
                    <div class="absolute -right-8 bottom-16 h-32 w-32 rounded-full bg-teal-200/80 blur-2xl"></div>
                    <div class="relative rounded-[2rem] bg-white p-3 shadow-soft ring-1 ring-teal-100">
                        <img src="{{ asset('assets/images/new-hero.png') }}" class="h-auto w-full rounded-[1.5rem] object-cover" alt="Ilustrasi tanaman jambu untuk sistem pakar diagnosa hama">
                        <div class="absolute -bottom-6 left-6 right-6 rounded-2xl border border-white/70 bg-white/90 p-4 shadow-xl shadow-teal-900/10 backdrop-blur">
                            <p class="text-sm font-semibold text-guava-dark">Diagnosa berbasis gejala</p>
                            <p class="mt-1 text-sm text-slate-500">Bantu identifikasi hama tanaman jambu secara lebih terarah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white px-5 py-14 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($stats as $stat)
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl hover:shadow-teal-900/10">
                            <div class="mb-5 grid h-12 w-12 place-items-center rounded-2xl bg-teal-50 text-guava-leaf">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}" />
                                </svg>
                            </div>
                            <div class="text-4xl font-black tracking-normal text-slate-950">{{ $stat['value'] }}</div>
                            <p class="mt-2 font-semibold text-slate-500">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-slate-50 px-5 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="mx-auto max-w-7xl">
                <div class="max-w-3xl">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-guava-leaf">Cara menggunakan</p>
                    <h2 class="mt-3 text-3xl font-black leading-tight tracking-normal text-slate-950 sm:text-4xl">
                        3 langkah mudah menggunakan sistem pakar diagnosa hama tanaman jambu
                    </h2>
                </div>

                <div class="mt-8 grid gap-4 lg:grid-cols-3">
                    @foreach($steps as $index => $step)
                        <div class="flex gap-4 rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-guava-leaf text-base font-black text-white">
                                {{ $index + 1 }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-950">{{ $step['title'] }}</h3>
                                <p class="mt-2 leading-7 text-slate-600">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-white px-5 py-8 text-center sm:px-6 lg:px-8">
        <p class="text-sm text-slate-500">
            &copy; 2024 <strong class="font-semibold text-guava-dark">Sistem Pakar Hama Tanaman Jambu</strong>.
        </p>
    </footer>
</div>
</body>
</html>
