@extends('layouts.satoshi')
@section('title', 'Data Diagnosa User')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <header class="py-4 border-bottom">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <a href="{{ route('admin.diagnosa.index') }}" class="btn-close text-xs"></a>
                        </div>
                        <div class="vr opacity-20 my-1"></div>
                        <h1 class="h4 ls-tight">Diagnosa User</h1>
                    </div>
                </div>
            </div>
        </header>

        <div class="table-responsive">
            <table class="table table-condensed table-hover">
                <tr>
                    <th>Tanggal</th>
                    <td><b>{{ $diagnosa->created_at->translatedFormat('d F Y H:i') }}</b></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><b>{{ $diagnosa->user->name }}</b></td>
                </tr>
                <tr>
                    <th>Hasil Diagnosa</th>
                    <td><b>{{ $diagnosa->hama->nama }}</b></td>
                </tr>
                <tr>
                    <th>Persentase</th>
                    <td><b>{{ $diagnosa->persentase }}%</b></td>
                </tr>
            </table>
        </div>

        <div class="card border-0 border-xxl h-md-100 mt-5">
            <div class="card-body p-0 p-xxl-6">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h5>Gejala Yang Dipilih</h5>
                    </div>
                </div>
                <div class="vstack gap-6">
                    @foreach ($diagnosa->gejala as $gejala)
                        <div class="hover">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <h6 class="progress-text mb-1 d-block">{{ $gejala->kode }}</h6>
                                    <p class="text-muted text-xs">{{ $gejala->nama }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card border-0 border-xxl h-md-100 mt-5">
            <div class="card-body p-0 p-xxl-6">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h5>Matrix Hubungan Hama dan Gejala</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dt-data">
                        <thead>
                        <tr>
                            <th rowspan="2" class="text-center">
                                <strong>Gejala</strong>
                            </th>
                            <th colspan="{{ $dataHama->count() }}" class="text-center">
                                <strong>Hama</strong>
                            </th>
                        </tr>
                        <tr>
                            @foreach ($dataHama as $item)
                                <td class="text-center">{{ $item->kode }}</td>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($diagnosaService->matrixNilaiCf() as $kodeGejala => $data)
                            <tr>
                                <td class="text-center">{{ $kodeGejala }}</td>
                                @foreach ($data as $nilai)
                                    <td class="text-center">
                                        {{ $nilai ?? '-' }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h5 class="mb-3">Perhitungan Metode VCIRS</h5>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($diagnosaService->hitung() as $data)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $loop->index }}-tab"
                                data-bs-toggle="tab" data-bs-target="#tab_{{ $loop->index }}"
                                type="button"
                                role="tab" aria-controls="{{ $loop->index }}"
                                aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}">
                            {{ $data['hama']->kode }}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($diagnosaService->hitung() as $data)
                    <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="tab_{{ $loop->index }}"
                         role="tabpanel" aria-labelledby="{{ $loop->index }}-tab">
                        <div class="mb-5"></div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-hover">
                                <tr>
                                    <th>Nama Hama</th>
                                    <td><b>{{ $data['hama']->nama }}</b></td>
                                </tr>
                                <tr>
                                    <th>Kode</th>
                                    <td><b>{{ $data['hama']->kode }}</b></td>
                                </tr>
                                <tr>
                                    <th>Nilai</th>
                                    <td><b>{{ $data['cf_kombinasi']['result'] }}</b></td>
                                </tr>
                                <tr>
                                    <th>Persentase</th>
                                    <td><b>{{ $data['cf_kombinasi']['persentase'] }}%</b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="card border-0 border-xxl h-md-100 mt-5">
                            <div class="card-body p-0 p-xxl-6">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5>Rule</h5>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover my-table">
                                        <thead>
                                        <tr>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th class="text-center">Jumlah Node</th>
                                            <th>Node yang menggunakan</th>
                                            <th class="text-center">Urutan Node</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data['rule'] as $rule)
                                            <tr>
                                                <td>{{ $rule['gejala']->kode }}</td>
                                                <td>{{ $rule['gejala']->nama }}</td>
                                                <td class="text-center">{{ $rule['number_of_node'] }}</td>
                                                <td>
                                                    @foreach ($rule['nodes'] as $node)
                                                        <span class="btn btn-neutral btn-xs me-1 rounded-pill">
                                                            H0{{ $node }}#{{ $node }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">{{ $rule['number'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 border-xxl h-md-100 mt-5">
                            <div class="card-body p-0 p-xxl-6">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5>Nilai VUR</h5>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover my-table">
                                        <thead>
                                       <tr>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th class="text-center">Nilai VUR</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data['vur'] as $vur)
                                            <tr>
                                                <td>{{ $vur['gejala']->kode }}</td>
                                                <td>{{ $vur['gejala']->nama }}</td>
                                                <td class="text-center">{{ $vur['nilai'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-5">
                            <table class="table table-condensed table-bordered table-hover">
                                <tr>
                                    <th>Nilai NUR</th>
                                    <td><b>{{ $data['nur'] }}</b></td>
                                </tr>
                                <tr>
                                    <th>Nilai RUR</th>
                                    <td><b>{{ $data['rur'] }}</b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="card border-0 border-xxl h-md-100 mt-5">
                            <div class="card-body p-0 p-xxl-6">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5>Nilai CF User</h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover my-table">
                                        <thead>
                                        <tr>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th class="text-center">Jawaban User</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data['jawaban_user'] as $jawaban)
                                            <tr>
                                                <td>{{ $jawaban['gejala']->kode }}</td>
                                                <td>{{ $jawaban['gejala']->nama }}</td>
                                                <td class="text-center">{{ $jawaban['jawaban'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 border-xxl h-md-100 mt-5">
                            <div class="card-body p-0 p-xxl-6">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5>Perhitungan Nilai CF</h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-condensed table-bordered table-hover my-table">
                                        <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center"
                                                style="vertical-align: middle;">Kode Gejala</th>
                                            <th rowspan="2" style="vertical-align: middle;">Nama Gejala
                                            </th>
                                            <th colspan="2" class="text-center"
                                                style="vertical-align: middle;">Bobot</th>
                                            <th colspan="2" class="text-center"
                                                style="vertical-align: middle;">Nilai</th>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Pakar</td>
                                            <td class="text-center">User</td>
                                            <td class="text-center">CF</td>
                                            <td class="text-center">CFR</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data['bobot'] as $nilaiCf)
                                            <tr>
                                                <td class="text-center">{{ $nilaiCf['gejala']->kode }}
                                                </td>
                                                <td>{{ $nilaiCf['gejala']->nama }}</td>
                                                <td class="text-center">{{ $nilaiCf['bobot']['pakar'] }}
                                                </td>
                                                <td class="text-center">{{ $nilaiCf['bobot']['user'] }}
                                                </td>
                                                <td class="text-center">{{ $nilaiCf['nilai']['cf'] }}
                                                </td>
                                                <td class="text-center">{{ $nilaiCf['nilai']['cfr'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 border-xxl h-md-100 mt-5">
                            <div class="card-body p-0 p-xxl-6">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5>Hasil Perhitungan</h5>
                                    </div>
                                </div>

                                <p>
                                    Berdasarkan hasil perhitungan menggunakan metode VCIRS dan <i>Certainty Factor</i>, penyakit <b>{{ $data['hama']['nama'] }}</b>
                                    menghasilkan nilai {{ $data['cf_kombinasi']['result'] }} atau
                                    {{ $data['cf_kombinasi']['persentase'] }}% keyakinan.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@push('custom_js')
    <script>
        $(document).ready(function () {
            $('#dt-data').DataTable();
        });
    </script>
@endpush
