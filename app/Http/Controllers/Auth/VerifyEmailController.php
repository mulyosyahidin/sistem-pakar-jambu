<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return match ($request->user()->role) {
                UserRole::ADMIN->value => redirect()->route('admin.dashboard'),
                UserRole::USER->value => redirect()->route('user.dashboard'),
            };
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return match ($request->user()->role) {
            UserRole::ADMIN->value => redirect()->route('admin.dashboard'),
            UserRole::USER->value => redirect()->route('user.dashboard'),
        };
    }
}
