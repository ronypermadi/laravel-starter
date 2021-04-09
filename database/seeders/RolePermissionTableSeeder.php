<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::pluck('id','id')->all();
        $role = Role::findByName('Admin');
        $role->syncPermissions($permissions);
        $role = Role::findByName('User');
        $role->syncPermissions([1,2]);
    }
}
