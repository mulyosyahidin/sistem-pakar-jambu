@extends('layouts.admin')
@section('title', 'Data Solusi')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <header class="py-4 border-bottom">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <a href="{{ route('admin.solusi.index') }}" class="btn-close text-xs"></a>
                        </div>
                        <div class="vr opacity-20 my-1"></div>
                        <h1 class="h4 ls-tight">{{ $solusi->kode }}</h1>
                    </div>
                </div>
                <div class="col-auto d-none d-md-block">
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{ route('admin.solusi.edit', $solusi) }}" class="btn btn-sm btn-warning text-white">
                            <span>Edit</span>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger text-white btn-delete">
                            <span>Hapus</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="table-responsive">
            <table class="table table-condensed table-hover">
                <tr>
                    <th>Solusi</th>
                    <td>{{ $solusi->solusi }}</td>
                </tr>
                <tr>
                    <th>Kode</th>
                    <td>{{ $solusi->kode }}</td>
                </tr>
            </table>
        </div>

        <div class="d-flex d-md-none justify-content-end gap-2">
            <div class="hstack gap-2 justify-content-end">
                <a href="{{ route('admin.solusi.edit', $solusi) }}" class="btn btn-sm btn-warning text-white">
                    <span>Edit</span>
                </a>
                <a href="#" class="btn btn-sm btn-danger text-white btn-delete">
                    <span>Hapus</span>
                </a>
            </div>
        </div>
    </main>
@endsection

@section('custom_html')
    <form action="{{ route('admin.solusi.destroy', $solusi) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        $("#dt-data").DataTable();
    </script>

    <script>
        let btnDelete = document.querySelectorAll('.btn-delete');
        let deleteForm = document.querySelector('#delete-form');

        btnDelete.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>
@endpush
