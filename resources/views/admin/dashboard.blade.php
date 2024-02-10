@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
        <div class="mb-6 mb-xl-10">
            <div class="row g-3 align-items-center">
                <div class="col"><h1 class="ls-tight">Analytics</h1></div>
                <div class="col">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-sm btn-neutral d-none d-sm-inline-flex"
                                data-bs-target="#depositLiquidityModal" data-bs-toggle="modal"><span
                                class="pe-2"><i class="bi bi-plus-circle"></i> </span><span>Liquidity</span>
                        </button>
                        <a href="page-overview.html"
                           class="btn d-inline-flex btn-sm btn-dark"><span>Trade</span></a></div>
                </div>
            </div>
        </div>
        <div class="vstack gap-3 gap-xl-6">
            <div class="row row-cols-xl-4 g-3 g-xl-6">
                <div class="col">
                    <div class="card">
                        <div class="p-4"><h6 class="text-limit text-muted mb-3">Orders</h6><span
                                class="text-sm text-muted text-opacity-90 fw-semibold">EUR</span> <span
                                class="d-block h3 ls-tight fw-bold">25.040,00</span>
                            <p class="mt-1"><span class="text-success text-xs"><i
                                        class="fas fa-arrow-up me-1"></i>20% </span><span
                                    class="text-muted text-xs text-opacity-75">vs last week</span></p></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4"><h6 class="text-limit text-muted mb-3">Orders</h6><span
                                class="text-sm text-muted text-opacity-90 fw-semibold">EUR</span> <span
                                class="d-block h3 ls-tight fw-bold">25.040,00</span>
                            <p class="mt-1"><span class="text-success text-xs"><i
                                        class="fas fa-arrow-up me-1"></i>20% </span><span
                                    class="text-muted text-xs text-opacity-75">vs last week</span></p></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4"><h6 class="text-limit text-muted mb-3">Orders</h6><span
                                class="text-sm text-muted text-opacity-90 fw-semibold">EUR</span> <span
                                class="d-block h3 ls-tight fw-bold">25.040,00</span>
                            <p class="mt-1"><span class="text-success text-xs"><i
                                        class="fas fa-arrow-up me-1"></i>20% </span><span
                                    class="text-muted text-xs text-opacity-75">vs last week</span></p></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4"><h6 class="text-limit text-muted mb-3">Orders</h6><span
                                class="text-sm text-muted text-opacity-90 fw-semibold">EUR</span> <span
                                class="d-block h3 ls-tight fw-bold">25.040,00</span>
                            <p class="mt-1"><span class="text-success text-xs"><i
                                        class="fas fa-arrow-up me-1"></i>20% </span><span
                                    class="text-muted text-xs text-opacity-75">vs last week</span></p></div>
                    </div>
                </div>
            </div>
            <div class="row g-3 g-xl-6">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row g-3 justify-content-between align-items-center">
                                <div class="col-12 col-sm"><h5>BTC to EUR Chart</h5></div>
                                <div class="col-12 col-sm-auto">
                                    <div
                                        class="d-flex scrollable-x justify-content-between gap-1 p-1 align-items-center bg-body-secondary rounded text-xs fw-semibold">
                                        <a href="#"
                                           class="px-3 py-1 text-muted bg-white-hover bg-opacity-70-hover rounded">1H </a><a
                                            href="#"
                                            class="px-3 py-1 text-muted bg-white rounded shadow-1">1D </a><a
                                            href="#"
                                            class="px-3 py-1 text-muted bg-white-hover bg-opacity-50-hover rounded">1W </a><a
                                            href="#"
                                            class="px-3 py-1 text-muted bg-white-hover bg-opacity-50-hover rounded">1M </a><a
                                            href="#"
                                            class="d-none d-sm-inline-block px-3 py-1 text-muted bg-white-hover bg-opacity-50-hover rounded">1Y</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-n4">
                                <div id="chart-crypto-price" data-height="420"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 g-xl-6">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body pb-3"><h5 class="mb-3">Asset Allocation</h5>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/btc.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Bitcoin</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $$23,000.00</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/eth.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Ethereum</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $$7,500.00</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/ada.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Cardano</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $$33,500.00</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/bnb.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Binance</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $$5,500.00</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/bnb.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Linkchain</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $$5,500.00</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center border-0 py-3">
                                    <div class="flex-none w-rem-10 h-rem-10"><img
                                            src="https://satoshi.webpixels.io/img/crypto/icon/btc.svg"
                                            class="w-100" alt="..."></div>
                                    <div class="flex-fill ms-4 text-limit">
                                        <div class="d-flex align-items-center justify-content-between"><a
                                                href="#"
                                                class="d-block text-sm text-heading fw-bold">Bitcoin</a> <span
                                                class="text-muted text-xs fw-semibold">47%</span></div>
                                        <div class="progress progress-sm my-1">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width:47%" aria-valuenow="47" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between text-xs text-muted text-end mt-1">
                                            <div><span class="font-weight-bold text-muted">Price: $0.32</span>
                                            </div>
                                            <div>
                                                <p class="card-text text-muted">
                                                    <time datetime="2020-06-23">Value: $</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end ms-7">
                                        <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                                 data-bs-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end"><a href="#!"
                                                                                            class="dropdown-item">Action </a><a
                                                    href="#!" class="dropdown-item">Another action </a><a
                                                    href="#!" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><h5>Transaction History</h5></div>
                                <div class="hstack align-items-center"><a href="#" class="text-muted"><i
                                            class="bi bi-arrow-repeat"></i></a></div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Bitcoin </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-warning">Pending</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Cardano </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-danger">Canceled</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Binance </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-success">Successful</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Bitcoin </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-warning">Pending</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Bitcoin </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-danger">Canceled</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                            <i class="bi bi-send-fill"></i></div>
                                        <div class=""><span class="d-block text-heading text-sm fw-semibold">Bitcoin </span><span
                                                class="d-none d-sm-block text-muted text-xs">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block text-sm">0xd029384sd343fd...eq23</div>
                                    <div class="d-none d-md-block"><span
                                            class="badge bg-body-secondary text-success">Successful</span></div>
                                    <div class="text-end"><span class="d-block text-heading text-sm fw-bold">+0.2948 BTC </span><span
                                            class="d-block text-muted text-xs">+$10,930.90</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
