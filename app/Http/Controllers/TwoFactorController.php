<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.2fa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required',
        ]);

        $user = Auth::user();

        if ($user->two_factor_code
            && hash_equals($user->two_factor_code, $request->input('two_factor_code'))
            && $user->two_factor_expires_at
            && $user->two_factor_expires_at->gt(now())) {

            $user->resetTwoFactorCode();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['two_factor_code' => 'Code invalide ou expiré.']);
    }

    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();

        return back()->with('status', 'Un nouveau code a été envoyé à votre adresse email.');
    }
}
