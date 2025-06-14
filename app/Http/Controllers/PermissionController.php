<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
   public function index()
{
    $permissions = Permission::all();
    $roles = Role::with('permissions')->get(); // Charge les rôles avec leurs permissions

    return view('permissions.index', compact('permissions', 'roles'));
}

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index');
    }

    public function show(Role $role)
    {
        // Charge les permissions liées au rôle
        $permissions = $role->permissions;

        // Passe le rôle et ses permissions à la vue
        return view('roles.permissions', compact('role', 'permissions'));
    }
}
