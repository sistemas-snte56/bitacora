<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            Admin -> [all]
            Manager -> [ver listado, ver usuario]
            Developer -> [dashboard]
        */
        $admin = Role::create(['name' => 'administrador']);
        $manager = Role::create(['name' => 'manager']);
        $developer = Role::create(['name' => 'developer']);

        // Agregando permisos a los roles creados
        Permission::create(['name'=>'dashboard'])->syncRoles([$admin,$manager,$developer]);
        Permission::create(['name'=>'users.index'])->syncRoles([$admin,$manager]);
        Permission::create(['name'=>'users.show'])->syncRoles([$admin,$manager]);
        Permission::create(['name'=>'users.create'])->assignRole($admin);
        Permission::create(['name'=>'users.store'])->assignRole($admin);
        Permission::create(['name'=>'users.update'])->assignRole($admin);
        Permission::create(['name'=>'users.edit'])->assignRole($admin);
        Permission::create(['name'=>'users.destroy'])->assignRole($admin);

    }
}
