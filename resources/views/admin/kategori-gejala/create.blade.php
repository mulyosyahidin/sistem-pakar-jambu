@extends('layouts.modernize')
@section('title', 'Tambah Data Kategori Gejala')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Tambah Data Kategori Gejala</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('gejala.index') }}">Gejala</a>
                                        </li> <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('kategori-gejala.index') }}">Kategori Gejala</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Tambah Data Kategori Gejala" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data Kategori Gejala</h5>

                        <a href="{{ route('kategori-gejala.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('kategori-gejala.store') }}" method="post">
                        @csrf

                        <div class="card-body p-4">
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
                        <div class="card-footer d-flex justify-content-end">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
