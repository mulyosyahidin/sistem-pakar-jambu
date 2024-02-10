<?php

namespace App\Http\Controllers;

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

        return view('gejala.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori_gejala::orderBy('nama')->get();

        return view('gejala.create', compact('kategori'));
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
            'media_file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,webm,ogg,mp3,wav,flac',
        ]);

        $gejala = Gejala::create($request->all());

        if ($gejala->media_type == 'image' && $request->has('media_file') && $request->file('media_file')->isValid()) {
            $fileService = new FileService();
            $file = $fileService->upload('media_file');

            File::create([
                'name' => 'Gejala Image #' . $gejala->id,
                'caption' => null,
                'file_name' => $file['file_name'],
                'file_path' => $file['file_path'],
                'file_size' => $file['file_size'],
                'file_mime_type' => $file['file_mime_type'],
            ]);

            $gejala->update([
                'media_url' => $file['file_path'],
            ]);
        }

        return redirect()
            ->route('gejala.index')
            ->withSuccess('Berhasil menambah data gejala baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        return view('gejala.show', compact('gejala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        $kategori = Kategori_gejala::orderBy('nama')->get();

        return view('gejala.edit', compact('gejala', 'kategori'));
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
        ]);

        $gejala->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'id_kategori' => $request->id_kategori,
            'media_type' => $request->media_type,
        ]);

        if ($gejala->media_type == 'video') {
            $gejala->update([
                'media_url' => $request->media_url,
            ]);
        }

        if ($request->media_type == 'image' && $request->has('media_file') && $request->file('media_file')->isValid())  {
            $fileService = new FileService();
            $file = $fileService->upload('media_file');

            if ($file) {
                File::create([
                    'name' => 'Gejala Image #' . $gejala->id,
                    'caption' => null,
                    'file_name' => $file['file_name'],
                    'file_path' => $file['file_path'],
                    'file_size' => $file['file_size'],
                    'file_mime_type' => $file['file_mime_type'],
                ]);

                $gejala->update([
                    'media_url' => $file['file_path'],
                ]);
            }
        }

        return redirect()
            ->route('gejala.show', $gejala)
            ->withSuccess('Berhasil memperbarui data gejala');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()
            ->route('gejala.index')
            ->withSuccess('Berhasil menghapus data gejala');
    }
}
