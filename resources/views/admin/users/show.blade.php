@extends('layouts.satoshi')
@section('title', 'Data User')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <header class="py-4 border-bottom">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <a href="{{ route('admin.users.index') }}" class="btn-close text-xs"></a>
                        </div>
                        <div class="vr opacity-20 my-1"></div>
                        <h1 class="h4 ls-tight">{{ $user->nama }}</h1>
                    </div>
                </div>
            </div>
        </header>

        <div class="table-responsive">
            <table class="table table-condensed table-hover">
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                @if($user->profile_picture)
                    <tr>
                        <th>Foto Profil</th>
                        <td>
                            <a href="{{ asset($user->profilePictureUrl) }}" target="_blank">
                                <img src="{{ asset($user->profilePictureUrl) }}" alt="{{ $user->name }}"
                                     class="img-fluid rounded" width="100" height="100">
                            </a>
                        </td>
                    </tr>
                @endif
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Terdaftar Pada</th>
                    <td>{{ $user->created_at->translatedFormat('l, d F Y H:i') }}</td>
                </tr>
            </table>
        </div>

        <div class="card border-0 border-xxl h-md-100 mt-5">
            <div class="card-body p-0 p-xxl-6">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h5>Riwayat Diagnosa</h5>
                    </div>
                </div>
                <div class="vstack gap-6">
                    @forelse($user->diagnosa as $diagnosa)
                        <div class="hover">
                            <div class="d-flex align-items-center gap-3">

                                <div>
                                    <h6 class="progress-text mb-1 d-block">{{ $diagnosa->created_at->translatedFormat('l, d M Y H:i') }}</h6>
                                    <p class="text-muted text-xs">{{ $diagnosa->hama->nama }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <p class="text-muted mb-0">Tidak ada data diagnosa.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
