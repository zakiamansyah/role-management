<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = Role::create(['name' => 'Superadmin']);
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        $menu1 = Menu::create(['name' => 'Dashboard', 'route' => 'dashboard']);
        $menu2 = Menu::create(['name' => 'Users', 'route' => 'users.index']);
        $menu3 = Menu::create(['name' => 'Settings', 'route' => 'settings']);

        $superadmin->menus()->attach([$menu1->id, $menu2->id, $menu3->id]);
        $admin->menus()->attach([$menu1->id, $menu2->id]);
        $user->menus()->attach([$menu1->id]);
    }
}
