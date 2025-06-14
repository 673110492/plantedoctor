<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Assure-toi que ce modèle existe
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs actifs
        $users = User::where('statut', true)->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|string', // Ou gérer upload fichier à part
            'statut' => 'nullable|boolean',
            'password' => 'required|string|min:6|confirmed', // password_confirmation attendu aussi
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'prenom' => $validated['prenom'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'adresse' => $validated['adresse'] ?? null,
            'date_naissance' => $validated['date_naissance'] ?? null,
            'photo' => $validated['photo'] ?? null,
            'statut' => $validated['statut'] ?? true,
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|nullable|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'sometimes|nullable|string|max:20',
            'adresse' => 'sometimes|nullable|string|max:255',
            'date_naissance' => 'sometimes|nullable|date',
            'photo' => 'sometimes|nullable|string',
            'statut' => 'sometimes|boolean',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        // Mise à jour des champs
        foreach ($validated as $key => $value) {
            if ($key === 'password' && $value) {
                $user->password = Hash::make($value);
            } else {
                $user->$key = $value;
            }
        }

        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
