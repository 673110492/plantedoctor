<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\Maladie;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::with('maladie')->get();
        return view('recommendations.index', compact('recommendations'));
    }

    public function create()
    {
        $maladies = Maladie::all();
        return view('recommendations.create', compact('maladies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maladie_id' => 'required|exists:maladies,id',
            'contenu' => 'required|string'
        ]);

        Recommendation::create($request->all());
        return redirect()->route('recommendations.index')->with('success', 'Recommandation ajoutée');
    }

    public function edit(Recommendation $recommendation)
    {
        $maladies = Maladie::all();
        return view('recommendations.edit', compact('recommendation', 'maladies'));
    }

    public function update(Request $request, Recommendation $recommendation)
    {
        $request->validate([
            'maladie_id' => 'required|exists:maladies,id',
            'contenu' => 'required|string'
        ]);

        $recommendation->update($request->all());
        return redirect()->route('recommendations.index')->with('success', 'Mise à jour réussie');
    }

    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
        return back()->with('success', 'Recommandation supprimée');
    }
}
