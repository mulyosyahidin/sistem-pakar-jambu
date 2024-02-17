@extends('layouts.satoshi')
@section('title', 'Data Diagnosa')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <header class="py-4 border-bottom">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <a href="{{ route('user.diagnosa.index') }}" class="btn-close text-xs"></a>
                        </div>
                        <div class="vr opacity-20 my-1"></div>
                        <h1 class="h4 ls-tight">Hasil Diagnosa</h1>
                    </div>
                </div>
                <div class="col-auto d-none d-md-block">
                    <div class="hstack gap-2 justify-content-end">
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
                    <th>Tanggal</th>
                    <td><b>{{ $diagnosa->created_at->translatedFormat('l, d M Y H:i') }}</b></td>
                </tr>
                <tr>
                    <th>Hama Terdiagnosa</th>
                    <td><b>{{ $diagnosa->hama->nama }}</b></td>
                </tr>
                <tr>
                    <th>Persentase</th>
                    <td><b>{{ $diagnosa->persentase }}%</b></td>
                </tr>
            </table>
        </div>

        <div class="card border-0 border-xxl h-md-100 mt-5">
            <div class="card-body p-0 p-xxl-6">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h5>Gejala</h5>
                    </div>
                </div>
                <div class="vstack gap-6">
                    @foreach ($diagnosa->gejala as $gejala)
                        <div class="hover">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <h6 class="progress-text mb-1 d-block">{{ $gejala->kode }}</h6>
                                    <p class="text-muted text-xs">{{ $gejala->nama }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="card border-0 border-xxl h-md-100 mt-5">
            <div class="card-body p-0 p-xxl-6">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h5>Solusi Penanganan</h5>
                    </div>
                </div>
                <div class="vstack gap-6">
                    @foreach ($diagnosa->hama->solusi as $solusi)
                        <div class="hover">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <span class="badge bg-info">
                                         {{ $loop->iteration }}
                                    </span>
                                    <p class="text-muted text-xs">{{ $solusi->solusi }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@section('custom_html')
    <form action="{{ route('user.diagnosa.destroy', $diagnosa) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
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
