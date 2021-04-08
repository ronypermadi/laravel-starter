<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Role;
use Livewire\Component;

class Roles extends Component
{
    public $role;
    public $roleId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updateRole") ? [
            'role.name' => 'required|min:3,' . $this->roleId,
        ] : [

        ];

        return array_merge([
            'role.name' => 'required|min:3',
        ], $rules);
    }

    public function createRole ()
    {
        $this->resetErrorBag();
        $this->validate();

        Role::create($this->role);

        $this->emit('saved');
        $this->reset('role');
    }

    public function updateRole ()
    {
        $this->resetErrorBag();
        $this->validate();

        Role::query()
            ->where('id', $this->roleId)
            ->update([
                "name" => $this->role->name,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->role && $this->roleId) {
            $this->role = Role::find($this->roleId);
        }

        $this->button = create_button($this->action, "Role");
    }

    public function render()
    {
        return view('livewire.roles.roles-form');
    }
}
