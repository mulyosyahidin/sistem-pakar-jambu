@extends('layouts.admin')
@section('title', 'Edit Profil')

@section('content')
    <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <header class="border-bottom mb-10 pb-5">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12"><h1 class="ls-tight">Edit Profil</h1></div>
                </div>
            </header>
            <div class="d-flex align-items-end justify-content-between">
                <span></span>
                <div class="d-none d-md-flex gap-2">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label class="form-label">Nama</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                               class="form-control @error('name') is-invalid @enderror" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center">
                <div class="col-md-2">
                    <label class="form-label">Email</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                               class="form-control @error('email') is-invalid @enderror" required>

                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="row align-items-center">
                <div class="col-md-2">
                    <label class="form-label">Password</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">

                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-6">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label class="form-label">Foto Profil</label>
                </div>
                <div class="col-md-8 col-xl-5">
                    <div class="">
                        <div class="d-flex align-items-center">
                            <a href="#" class="avatar avatar-lg bg-warning rounded-circle text-white">
                                <img src="{{ auth()->user()->profilePictureUrl }}" alt="Foto profil" class="img-fluid profile-picture"/>
                            </a>
                            <div class="hstack gap-2 ms-5">
                                <label for="file_upload" class="btn btn-sm btn-neutral">
                                    <span>Upload</span>
                                    <input type="file" name="file" id="file_upload" class="visually-hidden">
                                </label>
                                @if(auth()->user()->profile_picture)
                                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral text-danger btn-remove-profile-picture">
                                    <span>
                                        <i class="bi bi-trash"></i>
                                    </span>
                                        <span class="d-none d-sm-block me-2">Hapus</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 d-md-none">
            <div class="d-flex d-md-none justify-content-end gap-2 mb-6">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </form>
    </main>
@endsection

@section('custom_html')
    <form action="{{ route('admin.profil.delete-profile-picture') }}" method="post" id="delete-profile-picture-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let profilePictureElement = document.querySelector('.profile-picture');
        let fileUploadElement = document.querySelector('#file_upload');

        fileUploadElement.addEventListener('change', function (e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function (e) {
                profilePictureElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        });
    </script>

    @if(auth()->user()->profile_picture)
        <script>
            let removeProfilePictureButton = document.querySelector('.btn-remove-profile-picture');
            let deleteProfilePictureForm = document.querySelector('#delete-profile-picture-form');

            removeProfilePictureButton.addEventListener('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Yakin ingin menghapus foto profil? Tindakan ini tidak dapat dibatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteProfilePictureForm.submit();
                    }
                });
            });
        </script>
    @endif
@endpush
