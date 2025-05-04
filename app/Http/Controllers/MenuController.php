<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }
    
    public function create() {
        return view('menus.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'route' => 'required|string|max:255',
        ]);
        Menu::create($request->only('name', 'route'));
        return redirect()->route('menus.index')->with('success', 'Menu created');
    }
    
    public function edit(Menu $menu) {
        return view('menus.edit', compact('menu'));
    }
    
    public function update(Request $request, Menu $menu) {
        $request->validate([
            'name' => 'required|string|max:255',
            'route' => 'required|string|max:255',
        ]);
        $menu->update($request->only('name', 'route'));
        return redirect()->route('menus.index')->with('success', 'Menu updated');
    }

    public function destroy(Menu $menu) {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted');
    }
}
