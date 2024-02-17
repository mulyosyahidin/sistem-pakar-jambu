@extends('layouts.satoshi')
@section('title', 'Edit Data Hama')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <form action="{{ route('admin.hama.update', $hama) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <header class="py-4 border-bottom">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <a href="{{ route('admin.hama.show', $hama) }}" class="btn-close text-xs"></a>
                            </div>
                            <div class="vr opacity-20 my-1"></div>
                            <h1 class="h4 ls-tight">Edit Data Hama</h1>
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
                        <input type="text" name="nama" value="{{ old('nama', $hama->nama) }}"
                               class="form-control @error('nama') is-invalid @enderror" required>

                        @error('nama')
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
                        <input type="text" name="kode" value="{{ old('kode', $hama->kode) }}"
                               class="form-control @error('kode') is-invalid @enderror" required>

                        @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Deskripsi</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <textarea name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $hama->deskripsi) }}</textarea>

                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Foto</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="file" name="foto"
                               class="form-control @error('foto') is-invalid @enderror">
                        @if($hama->foto)
                            <small class="text-muted">Pilih foto baru untuk menghapus yang lama</small>
                        @endif

                        @error('foto')
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
