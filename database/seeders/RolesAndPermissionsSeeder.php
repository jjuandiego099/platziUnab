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


       
        $adminUser = User::updateOrCreate(
            ['id' => 1], // fuerza a usar el ID 1 si existe o lo crea si no
            [
                'name' => 'Juan Administrador',
                'email' => 'juandis0814@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('empresa123'),
                'remember_token' => Str::random(10),
               
            ]
        );
        $teacherUser = User::updateOrCreate(
            ['id' => 2], // fuerza a usar el ID 1 si existe o lo crea si no
            [
                'name' => 'Efrain Teacher',
                'email' => 'juandis08141@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('empresa123'),
                'remember_token' => Str::random(10),
               
            ]
        );
        $studentUser = User::updateOrCreate(
            ['id' => 3], // fuerza a usar el ID 1 si existe o lo crea si no
            [
                'name' => 'Vargas Student',
                'email' => 'juandis08142@hotmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('empresa123'),
                'remember_token' => Str::random(10),
               
            ]
        );
        $adminUser->assignRole('admin');
        $teacherUser->assignRole('teacher');
        $studentUser->assignRole('student');
        $admin->syncPermissions();
        $student->syncPermissions();
    }
}
