<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hama;
use App\Services\FileService;
use Illuminate\Http\Request;

class HamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hama::withCount('solusi')->orderByRaw('LENGTH(kode), kode')->get();

        return view('admin.hama.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:hama,kode',
            'nama' => 'required|string|unique:hama,nama',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $hama = Hama::create($request->all());

        $file = FileService::upload('foto');

        if ($file) {
            $hama->update([
                'foto' => $file['file_path'],
            ]);
        }

        return redirect()
            ->route('admin.hama.index')
            ->withSuccess('Berhasil menambah data hama baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hama $hama)
    {
        $hama->loadCount('solusi');

        return view('admin.hama.show', compact('hama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hama $hama)
    {
        return view('admin.hama.edit', compact('hama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hama $hama)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:hama,kode,' . $hama->id,
            'nama' => 'required|string|unique:hama,nama,' . $hama->id,
            'foto' => 'nullable|image|max:2048',
        ]);

        $hama->update($request->all());

        $file = FileService::upload('foto');

        if ($file) {
            if ($hama->foto) {
                FileService::delete($hama->foto);
            }

            $hama->update([
                'foto' => $file['file_path'],
            ]);
        }

        return redirect()
            ->route('admin.hama.show', $hama)
            ->withSuccess('Berhasil memperbarui data hama');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hama $hama)
    {
        FileService::delete($hama->foto);

        $hama->delete();

        return redirect()
            ->route('admin.hama.index')
            ->withSuccess('Berhasil menghapus data hama');
    }
}
