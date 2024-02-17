<nav class="flex-none navbar navbar-vertical navbar-expand-lg navbar-light bg-transparent show vh-lg-100 px-0 py-2"
     id="sidebar">
    <div class="container-fluid px-3 px-md-4 px-lg-6">
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-inline-block py-lg-1 mb-lg-5" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-dark h-rem-8 h-rem-md-10"
                 alt="...">
            <img src="{{ asset('assets/images/logo-light.png') }}" class="logo-light h-rem-8 h-rem-md-10"
                 alt="...">
        </a>
        <div class="navbar-user d-lg-none">
            <div class="dropdown">
                <a class="d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown"
                   aria-haspopup="false" aria-expanded="false">
                    <div>
                        <div class="avatar avatar-sm text-bg-secondary rounded-circle">
                            <img src="{{ auth()->user()->profilePictureUrl }}" alt="{{ auth()->user()->name }}">
                        </div>
                    </div>
                    <div class="d-none d-sm-block ms-3"><span class="h6">{{ auth()->user()->name }}</span></div>
                    <div class="d-none d-md-block ms-md-2">
                        <i class="bi bi-chevron-down text-muted text-xs"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-header">
                        <span class="d-block text-sm text-muted mb-1">Login sebagai</span>
                        <span class="d-block text-heading fw-semibold">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('profil.edit') }}">
                        <i class="bi bi-pencil me-3"></i> Edit Profil
                    </a>
                    <a class="dropdown-item logout-link" href="#">
                        <i class="bi bi-box-arrow-right me-3"></i> Keluar
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse overflow-x-hidden" id="sidebarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill {{ activeClass('user.dashboard') }}" href="{{ route('user.dashboard') }}">
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill {{ activeClass('user.diagnosa.*') }}" href="{{ route('user.diagnosa.index') }}">
                        <i class="bi bi-question-circle-fill"></i>
                        <span>Riwayat Diagnosa</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
