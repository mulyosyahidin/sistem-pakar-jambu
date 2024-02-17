@extends('layouts.modernize')
@section('title', 'Diagnosa')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Diagnosa</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Diagnosa</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Diagnosa" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Kelola Diagnosa User</h5>

                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle table-hover" id="dt-data"
                                   style="width: 100%;">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Hama Terdiagnosa</h6>
                                    </th>
                                    <th class="text-center">
                                        <h6 class="fs-4 fw-semibold mb-0">Persentase</h6>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $diagnosa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $diagnosa->created_at->translatedFormat('l, d M Y H:i') }}</td>
                                        <td>{{ $diagnosa->user->name }}</td>
                                        <td>{{ $diagnosa->hama->nama }}</td>
                                        <td class="text-center">{{ $diagnosa->persentase }}%</td>
                                        <td class="text-end">
                                            <a href="{{ route('diagnosa.show', $diagnosa) }}" class="btn btn-sm btn-success">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
