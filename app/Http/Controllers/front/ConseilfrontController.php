<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conseil;

class ConseilfrontController extends Controller
{
    // Affiche la liste des conseils
    public function index()
    {
        $conseils = Conseil::all();
        return view('front.conseil', compact('conseils'));
    }

    // Affiche le détail d'un conseil
    public function show($id)
    {
        $conseil = Conseil::findOrFail($id);
        return view('front.conseils_detail', compact('conseil'));
    }
}
