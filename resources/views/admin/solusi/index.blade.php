@extends('layouts.admin')
@section('title', 'Kelola Data Solusi')

@section('content')
    <main class="container-fluid p-0">
        <div class="px-6 px-lg-7 pt-8 border-bottom pb-5">
            <div class="d-flex align-items-center">
                <h1>Solusi</h1>

                <div class="hstack gap-2 ms-auto">
                    <a href="{{ route('admin.solusi.create') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-lg me-2"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-sm table-nowrap" id="dt-data">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex align-items-center gap-2 ps-1">
                            <span>#</span>
                        </div>
                    </th>
                    <th scope="col">Solusi</th>
                    <th scope="col">Kode</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3 ps-1">
                                <div><span class="d-block text-heading fw-bold">{{ $loop->iteration }}</span></div>
                            </div>
                        </td>
                        <td class="text-xs">{{ \Str::limit($item->solusi, 40) }}</td>
                        <td>{{ $item->kode }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.solusi.show', $item) }}" class="btn btn-xs btn-success text-white">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.solusi.edit', $item) }}" class="btn btn-xs btn-warning text-white">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="#" data-id="{{ $item->id }}" class="btn btn-xs btn-danger text-white btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('custom_html')
    <form action="#" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let deleteBtns = document.querySelectorAll('.btn-delete');
        let deleteForm = document.querySelector('#delete-form');

        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                let id = this.dataset.id;
                let url = '{{ route('admin.solusi.destroy', ':id') }}';
                url = url.replace(':id', id);

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.setAttribute('action', url);

                        deleteForm.submit();
                    }
                });

            });
        });
    </script>
@endpush
