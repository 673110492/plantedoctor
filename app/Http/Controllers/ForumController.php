<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();

        return view('forums.index', compact('forums'));
    }

    public function create()
    {
        $users = User::all();
        return view('forums.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|max:2048',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:users,id',
        ]);

        $forum = new Forum();
        $forum->title = $request->title;
        $forum->description = $request->description;
        $forum->created_by = auth()->id();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('forums', 'public');
            $forum->photo = $path;
        }

        $forum->save();

        $forum->users()->attach($request->user_ids);

        return redirect()->route('forums.index')->with('success', 'Forum créé avec succès');
    }

    public function show($id)
    {
        $forum = Forum::with(['users', 'messages.user'])->findOrFail($id);

        return view('forums.show', compact('forum'));
    }

    public function showAddUserForm(Forum $forum)
    {
        // Récupérer les utilisateurs qui ne sont pas encore membres du forum
        $users = User::whereNotIn('id', $forum->users()->pluck('user_id'))->get();

        return view('forums.add-user', compact('forum', 'users'));
    }

    public function addUser(Request $request, Forum $forum)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Attacher l'utilisateur au forum s'il n'y est pas déjà
        if (!$forum->users->contains($request->user_id)) {
            $forum->users()->attach($request->user_id);
        }

        return redirect()->route('forums.show', $forum)->with('success', 'Utilisateur ajouté avec succès.');
    }
}
