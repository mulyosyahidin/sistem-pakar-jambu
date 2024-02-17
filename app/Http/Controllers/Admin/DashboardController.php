<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Diagnosa;
use App\Models\Solusi;
use App\Models\User;
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

        $diagnosaTerbaru = Diagnosa::where('user_id', '!=', auth()->id())->with(['hama', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('count', 'diagnosaTerbaru'));
    }
}
