<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::withCount('konsultasi')->where('role', 'user')->get();

        return view('admin.users.index', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->loadCount('konsultasi');
        $user->load('konsultasi.hama');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->withSuccess('Berhasil menghapus data user');
    }
}
