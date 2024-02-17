@extends('layouts.modernize')
@section('title', 'Hasil Diagnosa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Hasil Diagnosa</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('hama.index') }}">Diagnosa</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">#{{ $diagnosa->id }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Lihat Data Hama" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data Diagnosa</h5>

                        <a href="{{ route('diagnosa.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle">
                                <tbody>
                                <tr>
                                    <th scope="row">User</th>
                                    <td>:</td>
                                    <td><strong>{{ $diagnosa->user->name }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Hasil Diagnosa</th>
                                    <td>:</td>
                                    <td><strong>{{ $diagnosa->hama->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Persentase</th>
                                    <td>:</td>
                                    <td><strong>{{ $diagnosa->persentase }}%</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Gejala</th>
                                    <td>:</td>
                                    <td><strong>{{ $diagnosa->gejala_count }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Bobot Nilai CF Gejala Hama</h5>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table
                                class="table table-bordered table-hover text-nowrap customize-table mb-0 align-middle"
                                id="dt-data">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Gejala</th>
                                    <th colspan="{{ $dataHama->count() }}" class="text-center">Hama</th>
                                </tr>
                                <tr>
                                    @foreach ($dataHama as $item)
                                        <td class="text-center">{{ $item->kode }}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach ($diagnosaService->matrixNilaiCf() as $kodeGejala => $data)
                                    <tr>
                                        <th class="text-center">{{ $kodeGejala }}</th>
                                        @foreach ($data as $nilai)
                                            <td class="text-center">
                                                {{ $nilai ?? '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Gejala Yang Dipilih</h5>

                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover"
                                   id="dt-data"
                                   style="width: 100%;">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Kode</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Gejala</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Bobot</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($diagnosa->gejala as $gejala)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gejala->kode }}</td>
                                        <td>{{ $gejala->nama }}</td>
                                        <td>{{ $gejala->bobot }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Hasil</h5>
                    </div>

                    <div class="card-body p-4">
                        <p>
                            Berdasarkan hasil perhitungan, gejala-gejala yang dilakukan diagnosa tersebut menghasilkan
                            hama <b>{{ $diagnosaService->hamaTertinggi()['hama']['nama'] }}</b> dengan nilai
                            {{ $diagnosaService->hamaTertinggi()['cf_kombinasi']['result'] }} atau
                            {{ $diagnosaService->hamaTertinggi()['cf_kombinasi']['persentase'] }}% keyakinan.
                        </p>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Perhitungan VCIRS</h5>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body p-4">
                        <div class="accordion" id="perhitungan">
                            @foreach ($diagnosaService->hitung() as $data)
                                <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                    <button class="accordion-button {{ $diagnosaService->hamaTertinggi()['hama']['nama'] == $data['hama']->nama ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $loop->index }}"
                                            aria-expanded="{{ $diagnosaService->hamaTertinggi()['hama']['nama'] == $data['hama']->nama ? 'true' : 'false' }}"
                                            aria-controls="collapse-{{ $loop->index }}">
                                        {{ $data['hama']->nama }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->index }}"
                                     class="accordion-collapse collapse {{ $diagnosaService->hamaTertinggi()['hama']['nama'] == $data['hama']->nama ? 'show' : '' }}"
                                     aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#perhitungan">
                                    <div class="accordion-body">
                                        <h6 class="mb-2 lh-sm">Rule</h6>

                                        <!--begin::Table-->
                                        <div class="table-responsive rounded-2 mb-4">
                                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover"
                                                   style="width: 100%;">
                                                <thead class="text-dark">
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Nama Gejala</th>
                                                    <th>Jumlah Node</th>
                                                    <th>Node yang menggunakan</th>
                                                    <th class="text-center">Urutan Node</th>
                                                </tr>
                                                <h5 class="mb-2 lh-sm">                    </thead>
                                                <tbody>
                                                @foreach ($data['rule'] as $rule)
                                                    <tr>
                                                        <td>{{ $rule['gejala']->kode }}</td>
                                                        <td>{{ $rule['gejala']->nama }}</td>
                                                        <td class="text-center">{{ $rule['number_of_node'] }}</td>
                                                        <td>
                                                            @foreach ($rule['nodes'] as $node)
                                                                <span class="badge bg-primary">
                                                                            P0{{ $node }}#{{ $node }}
                                                                        </span>
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">{{ $rule['number'] }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->

                                        <h6 class="mb-2 lh-sm">Nilai VUR</h6>
                                        <!--begin::Table-->
                                        <div class="table-responsive rounded-2 mb-4">
                                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover"
                                                   style="width: 100%;">
                                                <thead class="text-dark">
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
                                        <!--end::Table-->

                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <h6 class="mb-2 lh-sm">Nilai NUR</h6>
                                                <p>Nilai NUR didapatkan: <strong>{{ $data['nur'] }}</strong></p>
                                            </li>
                                            <li class="list-group-item">
                                                <h6 class="mb-2 lh-sm">Nilai RUR</h6>
                                                <p>Nilai RUR didapatkan: <strong>{{ $data['rur'] }}</strong></p>
                                            </li>
                                        </ul>

                                        <h6 class="mb-2 mt-3 lh-sm">Perhitungan Nilai CF</h6>

                                        <!--begin::Table-->
                                        <div class="table-responsive rounded-2 mb-4">
                                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover"
                                                   style="width: 100%;">
                                                <thead class="text-dark">
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
                                        <!--end::Table-->

                                        <h6 class="mt-2">Nilai CF</h6>
                                        <!--begin::Table-->
                                        <div class="table-responsive rounded-2 mb-4">
                                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover table-bordered"
                                                   style="width: 100%;">
                                                <thead class="text-dark">
                                                <tr>
                                                    <th rowspan="2" class="text-center"
                                                        style="vertical-align: middle;">Kode Gejala
                                                    </th>
                                                    <th rowspan="2" style="vertical-align: middle;">Nama Gejala
                                                    </th>
                                                    <th colspan="2" class="text-center"
                                                        style="vertical-align: middle;">Bobot
                                                    </th>
                                                    <th colspan="2" class="text-center"
                                                        style="vertical-align: middle;">Nilai
                                                    </th>
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
                                        <!--end::Table-->

                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <h6 class="mt-3 mb-0 lh-sm">Nilai CF Kombinasi</h6>
                                                <p>
                                                    Berdasarkan hasil perhitungan, hama <b>{{ $data['hama']['nama'] }}</b>
                                                    menghasilkan nilai {{ $data['cf_kombinasi']['result'] }} atau
                                                    {{ $data['cf_kombinasi']['persentase'] }}% keyakinan.
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        $("#dt-data").DataTable();
    </script>
@endpush
