@extends('layouts.admin')
@section('title', 'Data Gejala')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <header class="py-4 border-bottom">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <a href="{{ route('admin.gejala.index') }}" class="btn-close text-xs"></a>
                        </div>
                        <div class="vr opacity-20 my-1"></div>
                        <h1 class="h4 ls-tight">{{ $gejala->nama }}</h1>
                    </div>
                </div>
                <div class="col-auto d-none d-md-block">
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{ route('admin.gejala.edit', $gejala) }}" class="btn btn-sm btn-warning text-white">
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
                    <th>Nama</th>
                    <td>{{ $gejala->nama }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $gejala->kategori->nama }}</td>
                </tr>
                <tr>
                    <th>Kode</th>
                    <td>{{ $gejala->kode }}</td>
                </tr>
                <tr>
                    <th>Bobot</th>
                    <td>{{ $gejala->bobot }}</td>
                </tr>
                @if($gejala->deskripsi)
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $gejala->deskripsi }}</td>
                    </tr>
                @endif
                @if($gejala->media_type == 'image')
                    <tr>
                        <th>Foto</th>
                        <td>
                            <a href="{{ asset($gejala->media_url) }}" target="_blank">{{ $gejala->media_url }}</a>
                        </td>
                    </tr>
                @endif
                @if($gejala->media_type == 'video')
                    <tr>
                        <th>Video</th>
                        <td>
                            <a href="{{ asset($gejala->media_url) }}" target="_blank">{{ $gejala->media_url }} <i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                    </tr>
                @endif
            </table>
        </div>

        <div class="d-flex d-md-none justify-content-end gap-2">
            <div class="hstack gap-2 justify-content-end">
                <a href="{{ route('admin.gejala.edit', $gejala) }}" class="btn btn-sm btn-warning text-white">
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
    <form action="{{ route('admin.gejala.destroy', $gejala) }}" method="post" id="delete-form">
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
