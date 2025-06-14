<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
     public function edit(User $user)
    {
        return view('users.assign_roles', [
            'user' => $user,
            'roles' => Role::all(),
            'userRoles' => $user->roles->pluck('id')->toArray(), // rôles actuels de l'utilisateur
        ]);
    }

   public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user->syncRoles($request->roles ?? []);
        return redirect()->route('users.index')->with('success', 'Rôles mis à jour avec succès.');
    }
}
