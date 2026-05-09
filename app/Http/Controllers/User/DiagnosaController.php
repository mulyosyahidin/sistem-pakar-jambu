<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Services\DiagnosaService;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $data = Diagnosa::with('hama')->where('user_id', auth()->id())->latest()->get();

        return view('user.diagnosa.index', compact('data'));
    }

    public function create()
    {
        $gejala = Gejala::with('kategori')->orderBy('kode')->get();

        $gejala = $gejala->groupBy('id_kategori')->map(function ($item, $key) {
            if ($key == null) {
                $key = 'Lainnya';
            } else {
                $key = $item->first()->kategori->nama;
            }

            return [
                'kategori' => $key,
                'data' => $item,
            ];
        })->sortByDesc(function ($item) {
            return $item['kategori'] === 'Lainnya' ? PHP_INT_MAX : $item['kategori'];
        });

        return view('user.diagnosa.create', compact('gejala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_gejala' => 'required|array',
            'id_gejala.*' => 'required|exists:gejala,id',
        ]);

        $diagnosa = Diagnosa::create([
            'user_id' => auth()->id(),
        ]);
        $diagnosa->gejala()->attach($request->id_gejala);

        $diagnosaService = new DiagnosaService($diagnosa);
        $hasilDiagnosa = $diagnosaService->hamaTertinggi();

        $diagnosa->update([
            'id_hama' => $hasilDiagnosa['hama']['id'],
            'persentase' => $hasilDiagnosa['cf_kombinasi']['persentase'],
        ]);

        return redirect()
            ->route('user.diagnosa.show', $diagnosa->id)
            ->withSuccess('Berhasil melakukan diagnosa');
    }

    public function show(Diagnosa $diagnosa)
    {
        $diagnosa->load('gejala', 'hama');

        return view('user.diagnosa.show', compact('diagnosa'));
    }

    public function destroy(Diagnosa $diagnosa)
    {
        $diagnosa->delete();

        return redirect()
            ->route('user.diagnosa.index')
            ->withSuccess('Berhasil menghapus diagnosa');
    }
}
