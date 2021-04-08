<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index_view ()
    {
        return view('pages.roles.role-data', [
            'roles' => Role::class
        ]);
    }
}
