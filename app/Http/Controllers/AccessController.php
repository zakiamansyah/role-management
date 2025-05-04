<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index() {
        $roles = Role::with('menus')->get();
        $menus = Menu::all();
        return view('access.index', compact('roles', 'menus'));
    }
    
    public function assign(Request $request) {
        $role = Role::findOrFail($request->role_id);
        $role->menus()->sync($request->menu_ids);
        return redirect()->route('access.index')->with('success', 'Access updated');
    }
}
