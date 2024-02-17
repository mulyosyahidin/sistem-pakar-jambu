<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Gejala;
use App\Models\Kategori_gejala;
use App\Services\FileService;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gejala::with('kategori')->orderBy('kode')->get();

        return view('admin.gejala.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori_gejala::orderBy('nama')->get();

        return view('admin.gejala.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:gejala,kode',
            'nama' => 'required|string|unique:gejala,nama',
            'bobot' => 'nullable|numeric',
            'id_kategori' => 'nullable|exists:kategori_gejala,id',
            'media_type' => 'nullable|in:image,video',
            'media_url' => 'nullable|url',
            'media_file' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $gejala = Gejala::create($request->all());

        if ($gejala->media_type == 'image') {
            $file = FileService::upload('media_file');

            $gejala->update([
                'media_url' => $file['file_path'],
            ]);
        }

        return redirect()
            ->route('admin.gejala.index')
            ->withSuccess('Berhasil menambah data gejala baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        return view('admin.gejala.show', compact('gejala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        $kategori = Kategori_gejala::orderBy('nama')->get();

        return view('admin.gejala.edit', compact('gejala', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:gejala,kode,' . $gejala->id,
            'nama' => 'required|string|unique:gejala,nama,' . $gejala->id,
            'bobot' => 'nullable|numeric',
            'id_kategori' => 'nullable|exists:kategori_gejala,id',
            'media_type' => 'nullable|in:image,video',
            'media_url' => 'nullable|url',
            'media_file' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $tipeMedia = $request->media_type;

        $gejala->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'id_kategori' => $request->id_kategori,
            'media_type' => $request->media_type,
        ]);

        if ($gejala->media_type == 'video') {
            if ($tipeMedia == 'image') {
                FileService::delete($gejala->media_url);
            }

            $gejala->update([
                'media_url' => $request->media_url,
            ]);
        }

        if ($request->media_type == 'image')  {
            $file = FileService::upload('media_file');

            if ($file) {
                if ($tipeMedia == 'image') {
                    FileService::delete($gejala->media_url);
                }

                $gejala->update([
                    'media_url' => $file['file_path'],
                ]);
            }
        }

        return redirect()
            ->route('admin.gejala.show', $gejala)
            ->withSuccess('Berhasil memperbarui data gejala');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        if ($gejala->media_type == 'image') {
            FileService::delete($gejala->media_url);
        }

        $gejala->delete();

        return redirect()
            ->route('admin.gejala.index')
            ->withSuccess('Berhasil menghapus data gejala');
    }
}
