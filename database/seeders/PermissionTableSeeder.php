<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'model-read',
            'model-create',
            'model-detail',
            'model-edit',
            'model-delete',
            'model-trash',
            'model-restore',
            'model-destroy'
         ];

        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
        
    }
}
