@extends('layouts.modernize')
@section('title', 'Edit Solusi Hama')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Edit Solusi Hama</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('hama.index') }}">Hama</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('hama.show', $hama) }}">{{ $hama->nama }}</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Edit Solusi</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Edit Solusi Hama" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Data Solusi</h5>

                        <div>
                            <a href="{{ route('hama.show', $hama) }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>

                    <form action="{{ route('hama.solusi.update', $hama) }}" method="post">
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
                                    @foreach ($solusi as $item)
                                        <tr class="{{ $loop->index % 2 == 0 ? 'odd' : 'even' }}">
                                            <td>
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" name="solusi[]"
                                                           value="{{ $item->id }}" id="solusi-{{ $item->id }}"
                                                        {{ old('solusi') && in_array($item->id, old('solusi')) ? 'checked' : (in_array($item->id, $solusiHama) ? 'checked' : '') }}>
                                                </div>
                                            </td>
                                            <td><span for="solusi-{{ $item->id }}"
                                                      class="text-gray-800 text-hover-primary mb-1">
                                                            <label
                                                                for="solusi-{{ $item->id }}">{{ $item->kode }}</label></span>
                                            </td>
                                            <td>
                                                <label for="solusi-{{ $item->id }}">{{ $item->solusi }}</label>
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
            'pageLength': {{ $solusi->count() }},
            'lengthChange': false,
        });
    </script>
@endpush
