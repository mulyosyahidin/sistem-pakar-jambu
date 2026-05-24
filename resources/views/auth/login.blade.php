<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#0f766e">

    <title>Login — Sistem Pakar Hama Tanaman Jambu Kristal</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
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
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-3deg); }
        }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }
        .animate-fade-in-up { animation: fade-in-up 0.7s ease-out both; }
        .animate-fade-in-up-delay { animation: fade-in-up 0.7s ease-out 0.15s both; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
<div class="min-h-screen flex">

    {{-- Left Panel - Decorative --}}
    <div class="hidden lg:flex lg:w-1/2 xl:w-[55%] relative overflow-hidden bg-guava-cream">
        {{-- Background pattern --}}
        <div class="absolute inset-0 -z-0 bg-[radial-gradient(circle_at_top_left,_rgba(20,184,166,0.18),_transparent_34%),linear-gradient(135deg,_rgba(255,255,255,0.92),_rgba(240,253,250,0.76))]"></div>

        {{-- Floating blobs --}}
        <div class="absolute -left-10 top-20 h-40 w-40 rounded-full bg-teal-200/60 blur-3xl animate-float"></div>
        <div class="absolute right-10 bottom-32 h-56 w-56 rounded-full bg-rose-200/50 blur-3xl animate-float-reverse"></div>
        <div class="absolute left-1/2 top-1/3 h-32 w-32 rounded-full bg-teal-100/80 blur-2xl animate-float-reverse"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col justify-between p-12 xl:p-20 w-full">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <span class="grid h-11 w-11 place-items-center rounded-full bg-guava-leaf text-white shadow-lg shadow-teal-700/20 transition group-hover:scale-110">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </span>
                    <span class="text-lg font-bold tracking-tight text-guava-dark">Pakar Jambu Kristal</span>
                </a>
            </div>

            <div class="animate-fade-in-up">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-teal-200 bg-white/80 px-4 py-2 text-sm font-semibold text-guava-dark shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-guava-fruit"></span>
                    Sistem Pakar Diagnosa
                </div>
                <h1 class="text-4xl font-black leading-tight tracking-normal text-slate-950 xl:text-5xl">
                    Diagnosa Hama<br>Tanaman Jambu Kristal<br>Secara Mandiri
                </h1>
                <p class="mt-6 max-w-lg text-lg leading-8 text-slate-600">
                    Login ke akun Anda untuk mulai mendiagnosa hama pada tanaman jambu kristal menggunakan metode VCIRS.
                </p>
            </div>

            @if(session()->has('status'))
                <div class="rounded-2xl border border-teal-200 bg-white/80 p-4 text-sm font-semibold text-guava-leaf shadow-sm backdrop-blur">
                    {{ session()->get('status') }}
                </div>
            @endif

            <div class="animate-fade-in-up-delay">
                <div class="rounded-2xl border border-white/70 bg-white/90 p-5 shadow-xl shadow-teal-900/10 backdrop-blur max-w-md">
                    <p class="text-sm font-semibold text-guava-dark">🌿 Diagnosa berbasis gejala</p>
                    <p class="mt-1 text-sm text-slate-500">Bantu identifikasi hama tanaman jambu kristal secara lebih terarah dan akurat.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Panel - Login Form --}}
    <div class="w-full lg:w-1/2 xl:w-[45%] flex items-center justify-center px-6 py-12 sm:px-12">
        <div class="w-full max-w-md animate-fade-in-up">
            {{-- Mobile Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 mb-10 lg:hidden group">
                <span class="grid h-11 w-11 place-items-center rounded-full bg-guava-leaf text-white shadow-lg shadow-teal-700/20">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                </span>
                <span class="text-lg font-bold tracking-tight text-guava-dark">Pakar Jambu Kristal</span>
            </a>

            {{-- Header --}}
            <div class="mb-8">
                <h2 class="text-3xl font-black tracking-normal text-slate-950">Login ke Akun Anda</h2>
                <p class="mt-3 text-slate-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-guava-leaf transition hover:text-guava-dark">Daftar disini</a>
                </p>
            </div>

            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           tabindex="1"
                           required
                           class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-800 shadow-sm transition placeholder:text-slate-400 focus:border-guava-leaf focus:outline-none focus:ring-2 focus:ring-guava-leaf/20 @error('email') border-red-400 ring-2 ring-red-400/20 @enderror"
                           placeholder="email@contoh.com">
                    @error('email')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-guava-leaf transition hover:text-guava-dark">Lupa Password?</a>
                    </div>
                    <input type="password"
                           id="password"
                           name="password"
                           autocomplete="current-password"
                           tabindex="2"
                           required
                           class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-800 shadow-sm transition placeholder:text-slate-400 focus:border-guava-leaf focus:outline-none focus:ring-2 focus:ring-guava-leaf/20 @error('password') border-red-400 ring-2 ring-red-400/20 @enderror"
                           placeholder="••••••••">
                    @error('password')
                    <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center gap-3">
                    <input type="checkbox"
                           name="remember"
                           value="1"
                           id="remember"
                           class="h-4 w-4 rounded border-slate-300 text-guava-leaf focus:ring-guava-leaf/20">
                    <label for="remember" class="text-sm text-slate-600">Tetap Login</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-full bg-guava-leaf px-7 py-3.5 text-base font-bold text-white shadow-soft transition hover:-translate-y-0.5 hover:bg-guava-dark focus:outline-none focus:ring-2 focus:ring-guava-leaf/50 focus:ring-offset-2 active:translate-y-0">
                    Login
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            {{-- Back to Home --}}
            <p class="mt-8 text-center text-sm text-slate-400">
                <a href="{{ route('home') }}" class="font-semibold text-slate-500 transition hover:text-guava-leaf">← Kembali ke Beranda</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
