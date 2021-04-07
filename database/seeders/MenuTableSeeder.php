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
            'is_multi' => false],
            ['id' => 2,
            'parent_id' => 0,
            'title' => 'Users',
            'text' => 'Users',
            'icon' => 'fas fa-users',
            'href' => 'user',
            'is_multi' => true],
            ['id' => 3,
            'parent_id' => 2,
            'title' => 'Users Data',
            'text' => 'Users Data',
            'icon' => '',
            'href' => 'user',
            'is_multi' => false],
            ['id' => 4,
            'parent_id' => 2,
            'title' => 'Users New',
            'text' => 'Users New',
            'icon' => '',
            'href' => 'user.new',
            'is_multi' => false],
        ];
        foreach($menus as $menu){
            Menu::create($menu);
        }
    }
}
