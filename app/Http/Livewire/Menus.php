<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Menus extends Component
{
    public $menu;
    public $parentMenu;
    public $menuId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updateMenu") ? [
            'menu.text' => 'required|min:3,' . $this->menuId,
            // 'menu.parent_id' => 'required,'. $this->menuId
        ] : [
            
        ];

        return array_merge([
            'menu.title' => 'required|min:3',
            'menu.text' => 'required|min:3',
            'menu.parent_id' => 'required',
            'menu.icon' => 'required',
            'menu.href' => 'required',
            'menu.is_multi' => 'required',
            'menu.role' => 'required'
        ], $rules);
    }

    public function createMenu ()
    {
        $this->resetErrorBag();
        $this->validate();
        
        // $this->menu['parent_id'] = empty($this->menu['parent_id']) ? 0 : $this->menu['parent_id'];

        Menu::create($this->menu);

        $this->emit('saved');
        $this->reset('menu');
    }

    public function updateMenu ()
    {
        $this->resetErrorBag();
        $this->validate();

        Menu::query()
            ->where('id', $this->menuId)
            ->update([
                "title" => $this->menu->title,
                "text" => $this->menu->text,
                "icon" => $this->menu->icon,
                "href" => $this->menu->href,
                "is_multi" => $this->menu->is_multi,
                "role" => $this->menu->role,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->menu && $this->menuId) {
            $this->menu = Menu::find($this->menuId);
        }
        $this->parentMenu = Menu::where('parent_id','=',0)->pluck('title','id')->all();
        // dd($this->allMenus);
        $this->button = create_button($this->action, "Menu");
    }

    public function render()
    {
        return view('livewire.menus.menus-form');
    }
}
