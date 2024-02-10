@extends('layouts.modernize')
@section('title', 'Data User')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Data User</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('users.index') }}">Data User</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">{{ $user->name }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Lihat Data User" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data User</h5>

                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive rounded-2 mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle">
                                <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>:</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td><strong>{{ $user->email }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Terdaftar Pada</th>
                                    <td>:</td>
                                    <td><strong>{{ $user->created_at->translatedFormat('l, d M Y H:i') }}</strong></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Konsultasi</th>
                                    <td>:</td>
                                    <td><strong>{{ $user->konsultasi_count }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-1">

                        <a href="#" class="btn btn-danger btn-delete">
                            <i class="ti ti-trash"></i> Hapus
                        </a>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom ">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Data Konsultasi</h5>
                    </div>

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
                                        <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Hama</h6>
                                    </th>
                                    <th class="text-center">
                                        <h6 class="fs-4 fw-semibold mb-0">Persentase</h6>
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->konsultasi as $konsultasi)
                                    <tr class="{{ $loop->iteration % 2 == 0 ? 'odd' : 'even' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $konsultasi->created_at->translatedFormat('l, d M Y H:i') }}</td>
                                        <td>{{ $konsultasi->hama->nama }}</td>
                                        <td class="text-center">{{ $konsultasi->persentase }}%</td>
                                        <td class="text-end">
                                            <a href=""
                                               class="btn btn-sm btn-success">
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

@section('custom_html')
    <form action="{{ route('users.destroy', $user) }}" method="post" id="delete-form">
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
