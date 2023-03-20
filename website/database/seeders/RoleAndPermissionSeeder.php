<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'create-blog-posts']);
        Permission::create(['name' => 'edit-blog-posts']);
        Permission::create(['name' => 'delete-blog-posts']);
        */
        Permission::create(['name' => 'edit-others-blog-posts']);
        Permission::create(['name' => 'delete-others-blog-posts']);

        $adminRole = Role::findById(1);
        $editorRole = Role::findById(2);
        $userRole = Role::findById(3);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts',
            'edit-others-blog-posts',
            'delete-others-blog-posts'
        ]);

        $editorRole->givePermissionTo([
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts',
            'edit-others-blog-posts',
            'delete-others-blog-posts'
        ]);


        $userRole->givePermissionTo([
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts'
        ]);

        $editor = User::first();
        $editor->assignRole('Editor');
        $admin = User::find(2);
        $admin->assignRole('Admin');
    }
}