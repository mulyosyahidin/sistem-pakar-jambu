<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $count = [
            'user' => \App\Models\User::where('role', UserRole::USER->value)->count(),
            'diagnosa' => \App\Models\Diagnosa::count(),
            'hama' => \App\Models\Hama::count(),
            'gejala' => \App\Models\Gejala::count(),
        ];

        return view('public.beranda', compact('count'));
    }
}
