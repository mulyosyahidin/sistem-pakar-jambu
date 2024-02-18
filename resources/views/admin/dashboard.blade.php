@extends('layouts.satoshi')
@section('title', 'Admin Dashboard')

@section('custom_head')
    <style>
        .icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection

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
                            <h6 class="text-limit text-muted mb-3">Diagnosa</h6>
                            <span
                                class="d-block h3 ls-tight fw-bold">{{ $count['diagnosa'] }}</span>
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
                                    <h5>Grafik Diagnosa Seminggu Terakhir</h5>
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
                                    <h5>Diagnosa Terbaru</h5>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                @forelse($diagnosaTerbaru as $item)
                                    <div class="list-group-item d-flex justify-content-between gap-6">
                                        <a href="{{ route('admin.diagnosa.show', $item) }}">
                                            <div class="d-flex justify-content-start gap-3">
                                                <div
                                                    class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                                    @if($item->hama->foto)
                                                        <img src="{{ asset($item->hama->foto) }}" alt="">
                                                    @else
                                                        <i class="bi bi-command"></i>
                                                    @endif
                                                </div>
                                                <div class="">
                                                <span
                                                    class="d-block text-heading text-sm fw-semibold">{{ $item->hama->nama }}</span>
                                                    <span
                                                        class="d-none d-sm-block text-muted text-xs">{{ $item->created_at->translatedFormat('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="list-group-item text-center">
                                        Tidak ada data
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('custom_js')
    <script>
        const dataDiagnosa = [
            @foreach($diagnosa7HariTerakhir as $item)
                {
                    x: '{{ $item['tanggal'] }}',
                    y: {{ $item['jumlah'] }}
                },
            @endforeach
        ];
    </script>
@endpush
