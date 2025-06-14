<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;

class PredictController extends Controller
{
    public function predict(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:5120',
    ]);

    try {
        // Sauvegarde de l'image
        $image = $request->file('image');
        $imagePath = $image->store('diagnostics', 'public'); // sauvegarde dans storage/app/public/diagnostics

        // Ici tu appelles ton modèle ML pour la prédiction (exemple statique)
        $predictedClass = 'Tache noire';
        $confidence = 0.9532;

        // Enregistrer dans la base de données
        Diagnostic::create([
            'image_path' => $imagePath,
            'predicted_class' => $predictedClass,
            'confidence' => $confidence,
        ]);

        // Retour avec les résultats et l'image accessible publiquement
        return back()->with('result', [
            'predicted_class' => $predictedClass,
            'confidence' => $confidence,
            'image_url' => asset('storage/' . $imagePath),
        ]);
    } catch (\Exception $e) {
        return back()->with('error', 'Erreur lors de la prédiction : ' . $e->getMessage());
    }
}
}
