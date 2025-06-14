<?php

namespace App\Http\Controllers;

use App\Models\Conseil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConseilController extends Controller
{
    /**
     * Affiche tous les conseils.
     */
    public function index()
    {
        $conseils = Conseil::all();
        return view('conseils.index', compact('conseils'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('conseils.create');
    }

    /**
     * Enregistre un nouveau conseil avec image.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'nom_scientifique' => 'nullable|string|max:255',
            'description_courte' => 'nullable|string',
            'symptomes' => 'nullable|string',
            'causes' => 'nullable|string',
            'mesures_preventives' => 'nullable|string',
            'controle_biologique' => 'nullable|string',
            'controle_chimique' => 'nullable|string',
            'image_principale_url' => 'nullable',
        ]);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('image_principale_url')) {
            $image = $request->file('image_principale_url');
            $imageName = Str::slug($request->nom) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('conseils', $imageName, 'public');
            $validated['image_principale_url'] = $path;
        }

        Conseil::create($validated);

        return redirect()->route('conseils.index')->with('success', 'Conseil ajouté avec succès.');
    }

    /**
     * Affiche un conseil.
     */
    public function show(string $id)
    {
        $conseil = Conseil::findOrFail($id);
        return view('conseils.show', compact('conseil'));
    }

    /**
     * Affiche le formulaire d’édition.
     */
    public function edit(string $id)
    {
        $conseil = Conseil::findOrFail($id);
        return view('conseils.edit', compact('conseil'));
    }

    /**
     * Met à jour un conseil existant.
     */
    public function update(Request $request, string $id)
    {
        $conseil = Conseil::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'nom_scientifique' => 'nullable|string|max:255',
            'description_courte' => 'nullable|string',
            'symptomes' => 'nullable|string',
            'causes' => 'nullable|string',
            'mesures_preventives' => 'nullable|string',
            'controle_biologique' => 'nullable|string',
            'controle_chimique' => 'nullable',
        ]);

        if ($request->hasFile('image_principale_url')) {
            // Supprimer l'ancienne image si elle existe
            if ($conseil->image_principale_url) {
                Storage::disk('public')->delete($conseil->image_principale_url);
            }

            $image = $request->file('image_principale_url');
            $imageName = Str::slug($request->nom) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('conseils', $imageName, 'public');
            $validated['image_principale_url'] = $path;
        }

        $conseil->update($validated);

        return redirect()->route('conseils.index')->with('success', 'Conseil mis à jour avec succès.');
    }

    /**
     * Supprime un conseil.
     */
    public function destroy(string $id)
    {
        $conseil = Conseil::findOrFail($id);

        // Supprimer l’image si elle existe
        if ($conseil->image_principale_url) {
            Storage::disk('public')->delete($conseil->image_principale_url);
        }

        $conseil->delete();

        return redirect()->route('conseils.index')->with('success', 'Conseil supprimé avec succès.');
    }
}
