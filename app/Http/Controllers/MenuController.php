<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        return view('pages.menus.menu-data', [
            'menus' => Menu::class
        ]);
    }
    
}
