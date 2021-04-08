<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'users':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.users',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'roles':
                    $roles = $this->model::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
    
                    return [
                        "view" => 'livewire.table.roles',
                        "roles" => $roles,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('role.new'),
                                'create_new_text' => 'Buat Role Baru',
                                'link_to' => route('permission'),
                                'link_to_text' => 'List Permission'
                            ]
                        ])
                    ];
                    break;
            case 'permissions':
                    $permissions = $this->model::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
    
                    return [
                        "view" => 'livewire.table.permissions',
                        "permissions" => $permissions,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('permission.new'),
                                'create_new_text' => 'Buat Permission Baru',
                                'link_to' => route('role'),
                                'link_to_text' => 'List Role'
                            ]
                        ])
                    ];
                    break;
            case 'menus':
                $menus = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.menus',
                    "menus" => $menus,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('menu.new'),
                            'create_new_text' => 'Buat Menu Baru'
                        ]
                    ])
                ];
                break;
            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
