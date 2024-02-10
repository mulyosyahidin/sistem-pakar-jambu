@extends('layouts.modernize')
@section('title', 'Tambah Data Solusi')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">Tambah Data Solusi</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none"
                                               href="{{ route('solusi.index') }}">Data Solusi</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('assets/themes/modernize/images/backgrounds/ChatBc.png') }}"
                                         alt="Tambah Data Solusi" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-0">Data Solusi</h5>

                        <a href="{{ route('solusi.index') }}" class="btn btn-sm btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('solusi.store') }}" method="post">
                        @csrf

                        <div class="card-body p-4">
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

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Solusi</label>
                                <textarea name="solusi"
                                          class="form-control @error('solusi') is-invalid @enderror"
                                          required>{{ old('solusi') }}</textarea>

                                @error('solusi')
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
