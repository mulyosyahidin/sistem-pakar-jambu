<nav class="flex-none navbar navbar-vertical navbar-expand-lg navbar-light bg-transparent show vh-lg-100 px-0 py-2"
     id="sidebar">
    <div class="container-fluid px-3 px-md-4 px-lg-6">
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <a class="navbar-brand d-inline-block py-lg-1 mb-lg-5" href="dashboard.html"><img
                src="https://satoshi.webpixels.io/img/logos/logo-dark.svg" class="logo-dark h-rem-8 h-rem-md-10"
                alt="..."> <img src="https://satoshi.webpixels.io/img/logos/logo-light.svg"
                                class="logo-light h-rem-8 h-rem-md-10" alt="..."></a>
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
                    <a class="dropdown-item" href="{{ route('admin.profil.edit') }}">
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
                <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill active"
                                             href="#sidebar-dashboards" data-bs-toggle="collapse" role="button"
                                             aria-expanded="true" aria-controls="sidebar-dashboards"><i
                            class="bi bi-house-fill"></i> <span>Dashboards</span> <span
                            class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>
                    <div class="collapse show" id="sidebar-dashboards">
                        <ul class="nav nav-sm flex-column mt-1">
                            <li class="nav-item"><a href="dashboard.html" class="nav-link">Default</a></li>
                            <li class="nav-item"><a href="dashboard-analytics.html"
                                                    class="nav-link fw-bold">Analytics</a>
                            </li>
                            <li class="nav-item"><a href="dashboard-wallet.html" class="nav-link">Wallet</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                             href="#sidebar-pages" data-bs-toggle="collapse" role="button"
                                             aria-expanded="false" aria-controls="sidebar-pages"><i
                            class="bi bi-bar-chart-fill"></i> <span>Pages</span> <span
                            class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>
                    <div class="collapse" id="sidebar-pages">
                        <ul class="nav nav-sm flex-column mt-1">
                            <li class="nav-item"><a href="page-overview.html" class="nav-link">Overview</a></li>
                            <li class="nav-item"><a href="page-table-listing.html" class="nav-link">Table
                                    Listing</a></li>
                            <li class="nav-item"><a href="page-details.html" class="nav-link">Details</a></li>
                            <li class="nav-item"><a href="page-create-form.html" class="nav-link">Create Form</a>
                            </li>
                            <li class="nav-item"><a href="page-list.html" class="nav-link">Large List</a></li>
                            <li class="nav-item"><a href="page-checklist.html" class="nav-link">Checklist</a></li>
                            <li class="nav-item"><a href="page-collection.html" class="nav-link">Collection</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                             href="#sidebar-account" data-bs-toggle="collapse" role="button"
                                             aria-expanded="false" aria-controls="sidebar-account"><i
                            class="bi bi-gear-fill"></i> <span>Account</span> <span
                            class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>
                    <div class="collapse" id="sidebar-account">
                        <ul class="nav nav-sm flex-column mt-1">
                            <li class="nav-item"><a href="account-general.html" class="nav-link">Settings</a></li>
                            <li class="nav-item"><a href="account-password.html" class="nav-link">Password</a></li>
                            <li class="nav-item"><a href="account-billing.html" class="nav-link">Billing</a></li>
                            <li class="nav-item"><a href="account-notifications.html"
                                                    class="nav-link">Notifications</a></li>
                            <li class="nav-item"><a href="account-team.html" class="nav-link">Team</a></li>
                            <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="register.html" class="nav-link">Register</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                             href="#sidebar-other" data-bs-toggle="collapse" role="button"
                                             aria-expanded="false" aria-controls="sidebar-other"><i
                            class="bi bi-file-break-fill"></i> <span>Other</span> <span
                            class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>
                    <div class="collapse" id="sidebar-other">
                        <ul class="nav nav-sm flex-column mt-1">
                            <li class="nav-item"><a href="other-pricing.html" class="nav-link">Pricing Plans</a>
                            </li>
                            <li class="nav-item"><a href="terms.html" class="nav-link">Terms of Service</a></li>
                            <li class="nav-item"><a href="error.html" class="nav-link">Error Page</a></li>
                            <li class="nav-item"><a href="https://satoshi.webpixels.io/index.html" class="nav-link">Landing
                                    Page</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
