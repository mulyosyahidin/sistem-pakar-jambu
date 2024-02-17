<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $diagnosa = auth()->user()->diagnosa()->with('hama')->get();
        $penyakitTerdiagnosa = $diagnosa->map(function ($item) {
            return $item->hama->nama;
        })->unique();

        $count = [
            'diagnosa' => auth()->user()->diagnosa()->count(),
            'penyakit' => $penyakitTerdiagnosa->count(),
        ];

        // array of last 7 days
        $last7Days = collect(range(0, 6))->map(function ($day) {
            return now()->subDays($day)->format('Y-m-d');
        })->reverse();

        $diagnosa7HariTerakhir = [];
        $n = 0;

        foreach ($last7Days as $day) {
            $diagnosa7HariTerakhir[$n] = [
                'tanggal' => Carbon::parse($day)->translatedFormat('d M'),
                'jumlah' => $diagnosa->filter(function ($item) use ($day) {
                    return $item->created_at->format('Y-m-d') === $day;
                })->count(),
            ];

            $n++;
        }

        $diagnosaTerbaru = $diagnosa->sortByDesc('created_at')->take(5);

        return view('user.dashboard', compact('count', 'diagnosa7HariTerakhir', 'diagnosaTerbaru'));
    }
}
