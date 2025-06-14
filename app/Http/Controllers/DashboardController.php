<?php

namespace App\Http\Controllers;

use App\Models\Conseil;
use App\Models\Diagnostic;
use App\Models\User;
use App\Models\Maladie;
use App\Models\Recommendation;
use App\Models\Forum;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
{
    $user = Auth::user();

    // Exemple si Maladie n'a pas de user_id mais a 'created_by'
    $countMaladies = Maladie::count();

    // Sinon si pas de lien, compter globalement
    // $countMaladies = Maladie::count();

    // Même chose pour les autres modèles, adapte en fonction de la structure
    $countRecommendations = Recommendation::count();
    $countDiagnostics = Diagnostic::count();
    $countForums = Forum::count();
    $countConseil = Conseil::count();

    $countUsers = $user->hasRole('admin') ? User::count() : 1;
    $countrole = $user->hasRole('admin') ? Role::count() : 0;

    return view('dashboard', compact(
        'countMaladies',
        'countRecommendations',
        'countDiagnostics',
        'countForums',
        'countConseil',
        'countUsers',
        'countrole'
    ));
}

}
