<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index_view ()
    {
        return view('pages.menus.menu-data', [
            'menu' => Menu::class
        ]);
    }
}

