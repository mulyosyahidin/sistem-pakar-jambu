@extends('layouts.modernize')
@section('title', 'Edit Basis Pengetahuan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Edit Basis Pengetahuan</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('basis-pengetahuan.index') }}">Basis Pengetahuan</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">{{ $hama->kode }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Edit Basis Pengetahuan" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Basis Pengetahuan</h5>

                        <a href="{{ route('basis-pengetahuan.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('basis-pengetahuan.update', $hama) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body p-4">
                            <div class="table-responsive rounded-2 mb-4">
                                <table class="table border text-nowrap customize-table mb-0 align-middle" id="dt-data"
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
                                            <h6 class="fs-4 fw-semibold mb-0">Solusi</h6>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($gejala as $item)
                                        <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}">
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" name="gejala[]"
                                                           value="{{ $item->id }}" id="gejala-{{ $item->id }}"
                                                        {{ old('gejala') && in_array($item->id, old('gejala')) ? 'checked' : (in_array($item->id, $gejalaHama) ? 'checked' : '') }}>
                                                </div>
                                            </td>
                                            <td>
                                                        <span
                                                            class="text-gray-800 text-hover-primary mb-1">{{ $item->kode }}</span>
                                            </td>
                                            <td>
                                                <label for="gejala-{{ $item->id }}">{{ $item->nama }}</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        $("#dt-data").DataTable({
            'pageLength': {{ $gejala->count() }},
            'lengthChange': false,
        });
    </script>
@endpush
