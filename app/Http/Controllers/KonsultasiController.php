<?php

namespace App\Http\Controllers;

use App\Models\Hama;
use App\Models\Konsultasi;
use App\Services\KonsultasiService;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $data = Konsultasi::where('user_id', '!=', auth()->id())->with('user', 'hama')->latest()->get();

        return view('konsultasi.index', compact('data'));
    }

    public function show(Konsultasi $konsultasi)
    {
        $konsultasi->load('user', 'hama');
        $konsultasi->loadCount('gejala');

        $konsultasiService = new KonsultasiService($konsultasi);
        $dataHama = Hama::with('gejala')->orderBy('kode')->get();

//        dd($konsultasiService->hitung());

        return view('konsultasi.show', compact('konsultasi', 'dataHama', 'konsultasiService'));
    }
}
