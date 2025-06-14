<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index() {
        return view('roles.index', ['roles' => Role::all()]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('roles.create');
    }


    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request) {
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Role $role) {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, Role $role) {
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
