@extends('layouts.satoshi')
@section('title', 'Tambah Data Solusi')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <form action="{{ route('admin.solusi.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <header class="py-4 border-bottom">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <a href="{{ route('admin.solusi.index') }}" class="btn-close text-xs"></a>
                            </div>
                            <div class="vr opacity-20 my-1"></div>
                            <h1 class="h4 ls-tight">Tambah Solusi Baru</h1>
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
                    <label class="form-label">Solusi</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="text" name="solusi" value="{{ old('solusi') }}"
                               class="form-control @error('solusi') is-invalid @enderror" required>

                        @error('solusi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Kode</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="text" name="kode" value="{{ old('kode') }}"
                               class="form-control @error('kode') is-invalid @enderror" required>

                        @error('kode')
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
