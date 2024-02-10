<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Http\Request;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Solusi::orderBy('kode')->get();

        return view('solusi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solusi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:solusi,kode',
            'solusi' => 'required|string',
        ]);

        Solusi::create($request->all());

        return redirect()
            ->route('solusi.index')
            ->withSuccess('Berhasil menambah data solusi baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solusi $solusi)
    {
        return view('solusi.show', compact('solusi'));
    }

    /**
     * Edit the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Solusi $solusi)
    {
        return view('solusi.edit', compact('solusi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Solusi $solusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solusi $solusi)
    {
        $request->validate([
            'kode' => 'required|string|max:4|unique:solusi,kode,' . $solusi->id,
            'solusi' => 'required|string',
        ]);

        $solusi->update($request->all());

        return redirect()
            ->route('solusi.show', $solusi)
            ->withSuccess('Berhasil memperbarui data solusi');
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param \App\Models\Solusi $solusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solusi $solusi)
    {
        $solusi->delete();

        return redirect()
            ->route('solusi.index')
            ->withSuccess('Berhasil menghapus data solusi');
    }
}
