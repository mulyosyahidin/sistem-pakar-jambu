@extends('layouts.modernize')
@section('title', 'Data Gejala')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Data Gejala</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('gejala.index') }}">Data Gejala</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">#{{ $gejala->kode }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Lihat Data Gejala" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data Gejala</h5>

                        <a href="{{ route('gejala.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle">
                                <tbody>
                                <tr>
                                    <th scope="row">Kode</th>
                                    <td>:</td>
                                    <td><strong>{{ $gejala->kode }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>:</td>
                                    <td><strong>{{ $gejala->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bobot</th>
                                    <td>:</td>
                                    <td><strong>{{ $gejala->bobot }}</strong></td>
                                </tr>

                                @if($gejala->media_type)
                                    <tr>
                                        <th scope="row">
                                            @if ($gejala->media_type == 'video')
                                                Video
                                            @elseif ($gejala->media_type == 'image')
                                                Foto
                                            @endif
                                        </th>
                                        <td>:</td>
                                        <td>
                                            @if ($gejala->media_type == 'video')
                                                <a href="{{ $gejala->media_url }}" target="_blank"
                                                   class="text-decoration-none">
                                                    <strong>
                                                        {{ $gejala->media_url }} <i class="ti ti-external-link"></i>
                                                    </strong>
                                                </a>
                                            @elseif ($gejala->media_type == 'image')
                                                <a href="{{ asset($gejala->media_url) }}" target="_blank"
                                                   class="text-decoration-none">
                                                    <strong>{{ asset( $gejala->media_url) }}</strong>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-1">
                        <a href="{{ route('gejala.edit', $gejala) }}" class="btn btn-warning">
                            <i class="ti ti-pencil"></i> Edit
                        </a>
                        <a href="#" class="btn btn-danger btn-delete">
                            <i class="ti ti-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    <form action="{{ route('gejala.destroy', $gejala) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        $("#dt-data").DataTable();
    </script>

    <script>
        let btnDelete = document.querySelector('.btn-delete');
        let deleteForm = document.querySelector('#delete-form');

        btnDelete.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Data?',
                text: "Yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    </script>
@endpush
