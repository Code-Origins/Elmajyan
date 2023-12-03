<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::updateOrCreate(['name' => 'customer'], ['name' => 'customer']);
        Role::updateOrCreate(['name' => 'admin'], ['name' => 'admin']);
        Role::updateOrCreate(['name' => 'Super Admin'], ['name' => 'Super Admin']);

        // create permissions
        $permissions = [
            'Manage Products',
            'Manage Pages',
            'Manage Categories',
            'Manage Users',
            'Manage Menus',
            'Manage Settings',
            'Manage Orders',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission], ['name' => $permission]);
        }

         $admin = \App\Models\User::updateOrCreate(['email' => 'admin@gmail.com'], [
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'status' => 'active',
             'password' => Hash::make(env('ADMIN_PASSWORD', 'admin'))
         ]);

        $admin->assignRole('Super Admin');
        $admin->assignRole('admin');
    }
}
