@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
        <div class="mb-6 mb-xl-10">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h1 class="ls-tight">Admin Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="vstack gap-3 gap-xl-6">
            <div class="row row-cols-xl-4 g-3 g-xl-6">
                <div class="col">
                    <div class="card">
                        <div class="p-4">
                            <h6 class="text-limit text-muted mb-3">Hama</h6>
                            <span
                                class="d-block h3 ls-tight fw-bold">{{ $count['hama'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4">
                            <h6 class="text-limit text-muted mb-3">Gejala</h6>
                            <span
                                class="d-block h3 ls-tight fw-bold">{{ $count['gejala'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4">
                            <h6 class="text-limit text-muted mb-3">Users</h6>
                            <span
                                class="d-block h3 ls-tight fw-bold">{{ $count['user'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="p-4">
                            <h6 class="text-limit text-muted mb-3">Konsultasi</h6>
                            <span
                                class="d-block h3 ls-tight fw-bold">{{ $count['konsultasi'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 g-xl-6">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row g-3 justify-content-between align-items-center">
                                <div class="col-12 col-sm">
                                    <h5>Grafik Konsultasi Seminggu Terakhir</h5>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Konsultasi Terbaru</h5>
                                </div>
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
