<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index_view ()
    {
        return view('pages.users.user-data', [
            'users' => User::class
        ]);
    }
}
