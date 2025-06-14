<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des champs
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'date_naissance' => ['nullable', 'date'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2Mo
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // On génère un nom unique pour la photo
            $photo = $request->file('photo');
            $photoName = Str::uuid() . '.' . $photo->getClientOriginalExtension();
            // On stocke dans storage/app/public/photos (il faut créer le lien symbolique avec "php artisan storage:link")
            $photoPath = $photo->storeAs('photos', $photoName, 'public');
        }

        // Création utilisateur
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'date_naissance' => $request->date_naissance,
            'photo' => $photoPath,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
