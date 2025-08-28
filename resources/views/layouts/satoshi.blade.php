<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">

    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/satoshi/css/utility.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/js/app.js'])
    @yield('custom_head')

    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }

        .table-bordered {
            border: 1px solid #e3e7f0;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #e3e7f0;
        }

        .table-bordered th {
            background-color: #f9fafc;
        }

        .table-bordered thead tr th {
            border-bottom: 1px solid #e3e7f0 !important;
        }

        .my-table thead th {
           font-weight: bold;
        }
    </style>
</head>
<body class="bg-body-tertiary">

<div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
    @include(getSidebarFileName())

    <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
        <div class="d-none d-lg-block d-lg-flex py-3">
            <div class="hstack flex-fill justify-content-end flex-nowrap gap-6 ms-auto px-6 px-xxl-8">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-sun-fill"></i>
                    </a>
                    <div class="dropdown-menu">
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="light">Light
                        </button>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark">Dark
                        </button>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="auto">System
                        </button>
                    </div>
                </div>

                <div class="dropdown">
                    <a class="avatar avatar-sm text-bg-dark rounded-circle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ auth()->user()->profilePictureUrl }}" alt="{{ auth()->user()->name }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Login sebagai</span>
                            <span class="d-block text-heading fw-semibold">{{ auth()->user()->name }}</span></div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profil.edit') }}"><i class="bi bi-pencil me-3"></i>
                            Edit Profil</a>
                        <a class="dropdown-item logout-link" href="#"><i class="bi bi-box-arrow-right me-3"></i> Keluar</a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
            @yield('content')
        </div>
    </div>
</div>

<form action="{{ route('logout') }}" method="post" id="logout-form">
    @csrf
</form>

@yield('custom_html')

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="{{ asset('assets/themes/satoshi/js/main.js') }}"></script>
<script src="{{ asset('assets/themes/satoshi/js/switcher.js') }}"></script>

<!-- Plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.min.js"></script>

<script>
    let logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach((link) => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari aplikasi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    });
</script>

@if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: `{{ session()->get('success') }}`,
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi kesalahan!',
            text: `{{ session()->get('error') }}`,
        })
    </script>
@endif

@stack('custom_js')

</body>
</html>
