<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        

        Permission::firstOrCreate(['name' => 'categorias', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'inscribirse', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'autenticacion', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'eliminar curso', 'guard_name' => 'web']);
         $admin = User::updateOrCreate(
            ['id' => 1], // fuerza a usar el ID 1 si existe o lo crea si no
            [
                'name' => 'Juan Administrador',
                'email' => 'juandis0814@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('empresa123'), 
                'remember_token' => Str::random(10),
            ]
        );
        $admin->syncPermissions('categorias','eliminar curso');
        $student->syncPermissions('inscribirse');
       
    }
}
