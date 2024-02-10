@extends('layouts.admin')
@section('title', 'Tambah Data Kategori Gejala')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <form action="{{ route('admin.kategori-gejala.store') }}" method="post">
            @csrf

            <header class="py-4 border-bottom">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <a href="{{ route('admin.kategori-gejala.index') }}" class="btn-close text-xs"></a>
                            </div>
                            <div class="vr opacity-20 my-1"></div>
                            <h1 class="h4 ls-tight">Tambah Kategori Gejala Baru</h1>
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Nama</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="form-control @error('nama') is-invalid @enderror" required>

                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">
            <div class="d-flex d-md-none justify-content-end gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>

        </form>
    </main>
@endsection
