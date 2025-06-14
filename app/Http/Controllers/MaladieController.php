<?php

namespace App\Http\Controllers;

use App\Models\Maladie;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class MaladieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $maladies = Maladie::with('recommendations')
            ->when($search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('symptome', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->get();

        return view('maladies.index', compact('maladies'));
    }


    public function create()
    {
        return view('maladies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:maladies,nom',
            'description' => 'nullable|string',
            'symptome' => 'nullable|string',
            'cause' => 'nullable|string',
            'recommendations' => 'nullable|array',
            'recommendations.*' => 'string'
        ]);

        $maladie = Maladie::create($request->only('nom', 'description'));

        foreach ($request->recommendations ?? [] as $rec) {
            $maladie->recommendations()->create(['contenu' => $rec]);
        }

        return redirect()->route('maladies.index')->with('success', 'Maladie ajoutée avec succès.');
    }

    public function edit(Maladie $malady)
    {
        return view('maladies.edit', ['maladie' => $malady]);
    }

    public function update(Request $request, Maladie $malady)
    {
        $request->validate([
            'nom' => 'required|unique:maladies,nom,' . $malady->id,
            'description' => 'nullable|string',
            'recommendations' => 'nullable|array',
            'recommendations.*' => 'string'
        ]);

        $malady->update($request->only('nom', 'description'));

        $malady->recommendations()->delete();
        foreach ($request->recommendations ?? [] as $rec) {
            $malady->recommendations()->create(['contenu' => $rec]);
        }

        return redirect()->route('maladies.index')->with('success', 'Maladie mise à jour.');
    }

    public function destroy(Maladie $malady)
    {
        $malady->delete();
        return redirect()->route('maladies.index')->with('success', 'Maladie supprimée.');
    }
}
