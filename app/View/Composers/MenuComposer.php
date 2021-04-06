<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    public function compose(View $view)
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        $params = [
            'menus' => $menus,
            'allMenus' => $allMenus,
            ];
        $view->with($params);
    }
}