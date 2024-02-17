<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hama;
use App\Models\Diagnosa;
use App\Services\DiagnosaService;

class DiagnosaController extends Controller
{
    public function index()
    {
        $data = Diagnosa::where('user_id', '!=', auth()->id())->with('user', 'hama')->latest()->get();

        return view('diagnosa.index', compact('data'));
    }

    public function show(Diagnosa $diagnosa)
    {
        $diagnosa->load('user', 'hama');
        $diagnosa->loadCount('gejala');

        $diagnosaService = new DiagnosaService($diagnosa);
        $dataHama = Hama::with('gejala')->orderBy('kode')->get();

//        dd($diagnosaService->hitung());

        return view('diagnosa.show', compact('diagnosa', 'dataHama', 'diagnosaService'));
    }
}
