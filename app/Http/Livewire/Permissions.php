<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Permission;
use Livewire\Component;

class Permissions extends Component
{
    public $permission;
    public $permissionId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updatePermission") ? [
            'permission.name' => 'required|min:3,' . $this->permissionId,
        ] : [

        ];

        return array_merge([
            'permission.name' => 'required|min:3',
        ], $rules);
    }

    public function createPermission ()
    {
        $this->resetErrorBag();
        $this->validate();

        Permission::create($this->permission);

        $this->emit('saved');
        $this->reset('permission');
    }

    public function updatePermission ()
    {
        $this->resetErrorBag();
        $this->validate();

        Permission::query()
            ->where('id', $this->permissionId)
            ->update([
                "name" => $this->permission->name,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->permission && $this->permissionId) {
            $this->permission = Permission::find($this->permissionId);
        }

        $this->button = create_button($this->action, "Permission");
    }

    public function render()
    {
        return view('livewire.permissions.permissions-form');
    }
}
