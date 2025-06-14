<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'boolean',
            'password' => 'required|min:6|confirmed',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('users', 'public');
        }

        User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'date_naissance' => $request->date_naissance,
            'photo' => $photoPath,
            'statut' => $request->statut ?? true,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'prenom' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string',
            'adresse' => 'nullable|string',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statut' => 'boolean',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->except(['photo', 'password']);

        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('users', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Bloquer la modification du statut pour l’admin
        if ($user->email === 'admin@gmail.com') {
            $data['statut'] = true;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    }


    public function destroy(User $user)
    {
        // Supprimer l'image si elle existe
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    }

    public function toggleStatus(User $user)
    {
        if ($user->email === 'admin@gmail.com') {
            return redirect()->route('users.index')->with('error', 'Impossible de modifier le statut de l’administrateur.');
        }

        $user->statut = !$user->statut;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Statut utilisateur modifié avec succès.');
    }
}
