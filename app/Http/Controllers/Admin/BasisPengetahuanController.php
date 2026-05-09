<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Hama;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hama = Hama::with('gejala')->orderByRaw('LENGTH(kode), kode')->get();

        $dataGejala = Gejala::orderBy('kode')->get();
        $dataHama = Hama::orderByRaw('LENGTH(kode), kode')->get();

        return view('admin.basis-pengetahuan.index', compact('hama', 'dataGejala', 'dataHama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Hama $hama)
    {
        $gejala = Gejala::orderBy('kode')->get();
        $gejalaHama = $hama->gejala->pluck('id')->toArray();

        return view('admin.basis-pengetahuan.edit', compact('gejala', 'hama', 'gejalaHama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hama $hama)
    {
        $request->validate([
            'gejala' => 'nullable|array',
        ]);

        $hama->gejala()->sync($request->gejala);

        return redirect()
            ->route('admin.basis-pengetahuan.index')
            ->withSuccess('Berhasil memperbarui data basis pengetahuan.');
    }
}
