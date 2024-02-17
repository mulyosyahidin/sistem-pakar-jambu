@extends('layouts.satoshi')
@section('title', 'User Dashboard')

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
                    <h1 class="ls-tight">
                        Dashboard
                    </h1>
                </div>
            </div>
        </div>

        <div class="row g-3 g-xxl-6 mb-xl-10">
            <div class="col-xxl-10">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h5>Jumlah Diagnosa Seminggu Terakhir</h5>
                                <div class="mx-n4">
                                    <div id="chart-users"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-2">
                <div class="vstack gap-3 gap-md-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card border-primary-hover">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="h6 stretched-link">Jumlah Diagnosa</span>
                                    </div>
                                    <div class="text-sm fw-semibold mt-3">{{ $count['diagnosa'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card border-primary-hover">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="h6 stretched-link">Jumlah Penyakit Terdiagnosa</span>
                                    </div>
                                    <div class="text-sm fw-semibold mt-3">{{ $count['penyakit'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 g-xxl-6">
            <div class="col">
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
                                    <a href="{{ route('user.diagnosa.show', $item) }}">
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

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('custom_js')
    <script>
        const chartCategories = [
            @foreach($diagnosa7HariTerakhir as $item)
                '{{ $item['tanggal'] }}',
            @endforeach
        ];
        const chartData = [
            @foreach($diagnosa7HariTerakhir as $item)
                {{ $item['jumlah'] }},
            @endforeach
        ];
    </script>
@endpush
