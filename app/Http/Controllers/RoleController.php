<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    
    public function create() {
        return view('roles.create');
    }
    
    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        Role::create($request->only('name'));
        return redirect()->route('roles.index')->with('success', 'Role created');
    }
    
    public function edit(Role $role) {
        return view('roles.edit', compact('role'));
    }
    
    public function update(Request $request, Role $role) {
        $request->validate(['name' => 'required|string|max:255']);
        $role->update($request->only('name'));
        return redirect()->route('roles.index')->with('success', 'Role updated');
    }

    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted');
    }
}
