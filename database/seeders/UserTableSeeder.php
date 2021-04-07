<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Admin RY',
            'email' => 'admin@ronypermadi.com',
            'password' => Hash::make('bismillah'),
            'status' => true ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
