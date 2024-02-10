<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Solusi::orderBy('kode')->get();

        return view('admin.solusi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.solusi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:solusi,kode',
            'solusi' => 'required|string',
        ]);

        Solusi::create($request->all());

        return redirect()
            ->route('admin.solusi.index')
            ->withSuccess('Berhasil menambah data solusi baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solusi $solusi)
    {
        return view('admin.solusi.show', compact('solusi'));
    }

    /**
     * Edit the specified resource.
     *
     * @return Response
     */
    public function edit(Solusi $solusi)
    {
        return view('admin.solusi.edit', compact('solusi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Solusi $solusi
     * @return Response
     */
    public function update(Request $request, Solusi $solusi)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:solusi,kode,' . $solusi->id,
            'solusi' => 'required|string',
        ]);

        $solusi->update($request->all());

        return redirect()
            ->route('admin.solusi.show', $solusi)
            ->withSuccess('Berhasil memperbarui data solusi');
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param \App\Models\Solusi $solusi
     * @return Response
     */
    public function destroy(Solusi $solusi)
    {
        $solusi->delete();

        return redirect()
            ->route('admin.solusi.index')
            ->withSuccess('Berhasil menghapus data solusi');
    }
}
