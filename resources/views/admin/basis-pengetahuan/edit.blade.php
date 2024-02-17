@extends('layouts.satoshi')
@section('title', 'Basis Pengetahuan')

@section('content')
    <main class="container-fluid px-6 pb-10">
        <form action="{{ route('admin.basis-pengetahuan.update', $hama) }}" method="post">
            @csrf
            @method('PUT')

            <header class="py-4 border-bottom pb-5">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <a href="{{ route('admin.basis-pengetahuan.index') }}" class="btn-close text-xs"></a>
                            </div>
                            <div class="vr opacity-20 my-1"></div>
                            <h1 class="h4 ls-tight">Basis Pengetahuan</h1>
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

            <div class="table-responsive">
                <table class="table table-hover table-striped table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div class="d-flex align-items-center gap-2 ps-1">
                                <div class="text-base">
                                    #
                                </div>
                            </div>
                        </th>
                        <th scope="col">Gejala</th>
                        <th scope="col">Kode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gejala as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3 ps-1">
                                    <input class="form-check-input" type="checkbox" name="gejala[]"
                                           value="{{ $item->id }}" id="gejala-{{ $item->id }}"
                                        {{ old('gejala') && in_array($item->id, old('gejala')) ? 'checked' : (in_array($item->id, $gejalaHama) ? 'checked' : '') }}>
                                </div>
                            </td>
                            <td>
                                <label for="gejala-{{ $item->id }}">
                                    {{ $item->nama }}
                                </label>
                            </td>
                            <td>
                                <label for="gejala-{{ $item->id }}">
                                    {{ $item->kode }}
                                </label>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex d-md-none justify-content-end gap-2 mt-4">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>

        </form>
    </main>
@endsection
