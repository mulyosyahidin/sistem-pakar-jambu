<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Solusi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard
     *
     * Dasbor menampilkan ringkasan data aplikasi seperti jumlah hama, gejala, user, dan konsultasi
     * serta riwayat konsultasi terbaru.
     *
     * @return \Illuminate\View\View
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

        return view('dashboard', compact('count', 'konsultasiTerbaru'));
    }
}
