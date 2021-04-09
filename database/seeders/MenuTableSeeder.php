<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['id' => 1,
            'parent_id' => 0,
            'title' => 'Dashboard',
            'text' => 'Dashboard',
            'icon' => 'fas fa-fire',
            'href' => 'dashboard',
            'is_multi' => false,
            'role' => 'Admin,User'],
            ['id' => 2,
            'parent_id' => 0,
            'title' => 'Users',
            'text' => 'Users',
            'icon' => 'fas fa-users',
            'href' => '',
            'is_multi' => true,
            'role' => 'Admin'],
            ['id' => 3,
            'parent_id' => 2,
            'title' => 'Users Data',
            'text' => 'Users Data',
            'icon' => '',
            'href' => 'user',
            'is_multi' => false,
            'role' => 'Admin'],
            ['id' => 4,
            'parent_id' => 2,
            'title' => 'Users New',
            'text' => 'Users New',
            'icon' => '',
            'href' => 'user.new',
            'is_multi' => false,
            'role' => 'Admin'],
            ['id' => 5,
            'parent_id' => 0,
            'title' => 'Role & Permission',
            'text' => 'Role & Permission',
            'icon' => 'fas fa-key',
            'href' => '',
            'is_multi' => true,
            'role' => 'Admin'],
            ['id' => 6,
            'parent_id' => 5,
            'title' => 'Role Data',
            'text' => 'Role Data',
            'icon' => '',
            'href' => 'role',
            'is_multi' => false,
            'role' => 'Admin'],
            ['id' => 7,
            'parent_id' => 5,
            'title' => 'Role New',
            'text' => 'Role New',
            'icon' => '',
            'href' => 'role.new',
            'is_multi' => false,
            'role' => 'Admin'],
            ['id' => 8,
            'parent_id' => 5,
            'title' => 'Permission Data',
            'text' => 'Permission Data',
            'icon' => '',
            'href' => 'permission',
            'is_multi' => false,
            'role' => 'Admin'],
            ['id' => 9,
            'parent_id' => 5,
            'title' => 'Permission New',
            'text' => 'Permission New',
            'icon' => '',
            'href' => 'permission.new',
            'is_multi' => false,
            'role' => 'Admin'],
        ];
        foreach($menus as $menu){
            Menu::create($menu);
        }
    }
}
