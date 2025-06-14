<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiagnosticController extends Controller
{
    /**
     * Affiche la liste des diagnostics, avec la maladie et les recommandations.
     */
    public function index()
    {
        // Récupère les diagnostics avec leur maladie et recommandations, triés par date
        $diagnostics = Diagnostic::with('maladie.recommendations')->orderBy('created_at', 'desc')->paginate(4);

        return view('diagnostics.index', compact('diagnostics'));
    }

    /**
     * Supprime un diagnostic spécifique et son image.
     */
    public function destroy($id)
    {
        $diagnostic = Diagnostic::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($diagnostic->image_path && Storage::exists('public/' . $diagnostic->image_path)) {
            Storage::delete('public/' . $diagnostic->image_path);
        }

        // Supprimer le diagnostic
        $diagnostic->delete();

        return redirect()->back()->with('success', 'Diagnostic supprimé avec succès.');
    }
}
