<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            'admin.roles.show',
            'admin.roles.create',
            'admin.roles.edit',
            'admin.roles.destroy',
            'admin.user.show',
            'admin.user.create',
            'admin.user.edit',
            'admin.user.destroy',
            'admin.bitacora.show',
            'admin.bitacora.create',
            'admin.bitacora.edit',
            'admin.bitacora.destroy',
            'admin.principal.show',
            'admin.principal.create',
            'admin.principal.edit',
            'admin.principal.destroy',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
