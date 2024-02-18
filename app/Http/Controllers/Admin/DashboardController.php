<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Diagnosa;
use App\Models\Solusi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $count = [
            'hama' => Hama::count(),
            'gejala' => Gejala::count(),
            'user' => User::where('role', 'user')->count(),
            'diagnosa' => Diagnosa::where('user_id', '!=', auth()->id())->count(),
            'solusi' => Solusi::count(),
        ];

        $diagnosa = Diagnosa::where('user_id', '!=', auth()->id())->get();

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

        $diagnosaTerbaru = Diagnosa::where('user_id', '!=', auth()->id())->with(['hama', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('count', 'diagnosaTerbaru', 'diagnosa7HariTerakhir'));
    }
}
