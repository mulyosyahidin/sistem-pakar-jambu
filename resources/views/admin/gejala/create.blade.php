@extends('layouts.modernize')
@section('title', 'Tambah Data Gejala')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Tambah Data Gejala</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('gejala.index') }}">Data Gejala</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Tambah Data hAMA" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data Gejala</h5>

                        <a href="{{ route('gejala.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('gejala.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Kode</label>
                                        <input type="text" name="kode" value="{{ old('kode') }}"
                                               class="form-control @error('kode') is-invalid @enderror" required>

                                        @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Nama</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                               class="form-control @error('nama') is-invalid @enderror" required>

                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Bobot</label>
                                <input type="text" name="bobot" value="{{ old('bobot') }}"
                                       class="form-control @error('bobot') is-invalid @enderror" required>

                                @error('bobot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="id_kategori"
                                        class="form-control @error('id_kategori') is-invalid @enderror">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_kategori') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold">Tipe Media</label>
                                    <select name="media_type" id="media-type"
                                            class="form-control @error('media_type') is-invalid @enderror">
                                        <option selected disabled>Pilih Tipe Media</option>
                                        <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>
                                            Video
                                        </option>
                                        <option value="image" {{ old('media_type') == 'image' ? 'selected' : '' }}>
                                            Foto
                                        </option>
                                    </select>

                                    @error('media_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-4 media-video">
                                        <label class="form-label fw-semibold">URL YouTube</label>
                                        <input type="url" name="media_url" value="{{ old('media_url') }}"
                                               class="form-control @error('media_url') is-invalid @enderror">

                                        @error('media_url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-4 media-image d-none">
                                        <label class="form-label fw-semibold">Pilih File</label>
                                        <input type="file" name="media_file"
                                               class="form-control @error('media_file') is-invalid @enderror">

                                        @error('media_file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        let mediaType = document.getElementById('media-type');
        let mediaVideo = document.querySelector('.media-video');
        let mediaImage = document.querySelector('.media-image');

        mediaType.addEventListener('change', function() {
            if (this.value == 'video') {
                mediaVideo.classList.remove('d-none');
                mediaImage.classList.add('d-none');
            } else if (this.value == 'image') {
                mediaVideo.classList.add('d-none');
                mediaImage.classList.remove('d-none');
            }
        });
    </script>
@endpush
