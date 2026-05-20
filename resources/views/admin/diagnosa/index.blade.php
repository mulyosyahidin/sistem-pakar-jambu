@extends('layouts.satoshi')
@section('title', 'Kelola Data Diagnosa User')

@section('content')
    <main class="container-fluid p-0">
        <div class="px-6 px-lg-7 pt-8 border-bottom pb-5">
            <h1>Diagnosa User</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-sm table-nowrap" id="dt-data">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex align-items-center gap-2 ps-1">
                            <span>#</span>
                        </div>
                    </th>
                    <th scope="col">User</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hasil Diagnosa</th>
                    <th scope="col">Persentase</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3 ps-1">
                                <div><span class="d-block text-heading fw-bold">{{ $loop->iteration }}</span></div>
                            </div>
                        </td>
                        <td class="text-xs">{{ $item->user->name }}</td>
                        <td class="text-xs">{{ $item->created_at->translatedFormat('d F Y H:i') }}</td>
                        <td class="text-xs">{{ $item->hama->nama }}</td>
                        <td class="text-xs">{{ $item->persentase }}%</td>
                        <td>{{ $item->kode }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.diagnosa.show', $item) }}" class="btn btn-xs btn-success text-white">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
