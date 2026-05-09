<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori_gejala;
use Illuminate\Http\Request;

class KategoriGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori_gejala::withCount('gejala')->orderBy('nama')->get();

        return view('admin.kategori-gejala.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_gejala,nama',
        ]);

        Kategori_gejala::create($request->all());

        return redirect()
            ->route('admin.kategori-gejala.index')
            ->withSuccess('Berhasil menambah data kategori gejala.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori_gejala $kategori_gejala)
    {
        return view('admin.kategori-gejala.edit', compact('kategori_gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori_gejala $kategori_gejala)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_gejala,nama,'.$kategori_gejala->id,
        ]);

        $kategori_gejala->update($request->all());

        return redirect()
            ->route('admin.kategori-gejala.index')
            ->withSuccess('Berhasil mengubah data kategori gejala.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori_gejala $kategori_gejala)
    {
        $kategori_gejala->delete();

        return redirect()
            ->route('admin.kategori-gejala.index')
            ->withSuccess('Berhasil menghapus data kategori gejala.');
    }
}
