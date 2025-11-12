<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $admin   = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $teacher = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        $student = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        $admin->syncPermissions(Permission::all());

        Permission::firstOrCreate(['name' => 'categorias', 'guard_name' => 'web']);
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
