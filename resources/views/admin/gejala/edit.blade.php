@extends('layouts.admin')
@section('title', 'Edit Data Gejala')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <form action="{{ route('admin.gejala.update', $gejala) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <header class="py-4 border-bottom">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <a href="{{ route('admin.gejala.index') }}" class="btn-close text-xs"></a>
                            </div>
                            <div class="vr opacity-20 my-1"></div>
                            <h1 class="h4 ls-tight">Edit Gejala Baru</h1>
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
                        <input type="text" name="nama" value="{{ old('nama', $gejala->nama) }}"
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
                    <label class="form-label">Kategori</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror"
                                required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_kategori', $gejala->id_kategori) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('id_kategori')
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
                        <input type="text" name="kode" value="{{ old('kode', $gejala->kode) }}"
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
                    <label class="form-label">Bobot</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="text" name="bobot" value="{{ old('bobot', $gejala->bobot) }}"
                               class="form-control @error('bobot') is-invalid @enderror" required>

                        @error('bobot')
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
                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $gejala->deskripsi) }}</textarea>

                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Jenis Media</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <select name="media_type" class="form-select @error('media_type') is-invalid @enderror"
                                required>
                            <option value="">Pilih Jenis</option>
                            <option value="image" {{ old('media_type', $gejala->media_type) == 'image' ? 'selected' : '' }}>Gambar</option>
                            <option value="video" {{ old('media_type', $gejala->media_type) == 'video' ? 'selected' : '' }}>Video</option>
                        </select>

                        @error('media_type')
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
                        <input type="file" name="media_file" class="form-control @error('media_file') is-invalid @enderror">
                        @if($gejala->media_type == 'image')
                            <small class="text-muted">
                                <a href="{{ asset($gejala->media_url) }}" target="_blank">Lihat Foto.</a> Pilih foto yang baru untuk mengganti yang lama.
                            </small>
                        @endif

                        @error('media_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center mt-5">
                <div class="col-md-2">
                    <label class="form-label">Link YouTube Video</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="url" name="media_url" value="{{ old('media_url', ($gejala->media_type == 'video' ? $gejala->media_url : '')) }}"
                               class="form-control @error('media_url') is-invalid @enderror">

                        @error('media_url')
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
