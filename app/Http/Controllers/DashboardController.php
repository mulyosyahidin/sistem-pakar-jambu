<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Solusi;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
            'konsultasi' => Konsultasi::where('user_id', '!=', auth()->id())->count(),
            'solusi' => Solusi::count(),
        ];

        $konsultasiTerbaru = Konsultasi::where('user_id', '!=', auth()->id())->with(['hama', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('count', 'konsultasiTerbaru'));
    }
}
