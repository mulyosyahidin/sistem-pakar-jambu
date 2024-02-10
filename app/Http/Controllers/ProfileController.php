<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profil.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $profilePicture = FileService::upload('file');

        if ($profilePicture) {
            $request->user()->update([
                'profile_picture' => $profilePicture['file_path'],
            ]);
        }

        return Redirect::route('admin.profil.edit')->with('success', 'Berhasil memperbarui profil');
    }

    public function deleteProfilePicture(Request $request)
    {
        $profilePicturePath = $request->user()->profile_picture;
        if ($profilePicturePath) {
            FileService::delete($profilePicturePath);

            $request->user()->update([
                'profile_picture' => null,
            ]);
        }

        return Redirect::route('admin.profil.edit')->with('success', 'Berhasil menghapus foto profil');
    }
}
