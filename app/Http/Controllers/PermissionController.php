<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index_view ()
    {
        return view('pages.permissions.permission-data', [
            'permissions' => Permission::class
        ]);
    }
}
