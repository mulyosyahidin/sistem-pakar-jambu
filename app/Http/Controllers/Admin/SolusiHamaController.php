<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hama;
use App\Models\Solusi;
use Illuminate\Http\Request;

class SolusiHamaController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hama $hama)
    {
        $solusi = Solusi::orderBy('kode')->get();
        $solusiHama = $hama->solusi->pluck('id')->toArray();

        return view('admin.solusi-hama.edit', compact('hama', 'solusi', 'solusiHama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hama $hama)
    {
        $request->validate([
            'solusi' => 'nullable|array',
        ]);

        $hama->solusi()->sync($request->solusi);

        return redirect()
            ->route('admin.hama.show', $hama)
            ->withSuccess('Berhasil memperbarui data solusi hama');
    }
}
