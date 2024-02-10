@extends('layouts.modernize')
@section('title', 'Kelola Data Solusi')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Kelola Data Solusi</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Data Solusi</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Kelola Data Solusi" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0 lh-sm">Kelola Solusi</h5>

                        <a href="{{ route('solusi.create') }}" class="btn btn-sm btn-success">
                            <i class="ti ti-plus"></i> Tambah Data
                        </a>
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
                                        <h6 class="fs-4 fw-semibold mb-0">Kode</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Solusi</h6>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ \Str::limit($item->solusi, 100, '...') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('solusi.show', $item->id) }}"
                                               class="btn btn-sm btn-success">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('solusi.edit', $item->id) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <a href="#" data-id="{{ $item->id }}"
                                               class="btn btn-sm btn-danger btn-delete">
                                                <i class="ti ti-trash"></i>
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
    <form action="#" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        $("#dt-data").DataTable();
    </script>

    <script>
        let deleteBtns = document.querySelectorAll('.btn-delete');
        let deleteForm = document.querySelector('#delete-form');

        $('#dt-data tbody').on('click', '.btn-delete', function (e) {
            e.preventDefault();

            let id = this.dataset.id;
            let url = '{{ route('solusi.destroy', ':id') }}';
            url = url.replace(':id', id);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.setAttribute('action', url);
                    deleteForm.submit();
                }
            });
        });
    </script>
@endpush
