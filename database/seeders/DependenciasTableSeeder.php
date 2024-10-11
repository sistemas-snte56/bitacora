<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DependenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencias = [
            ['dependencia' => 'Preescolar', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Primaria', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Secundarias', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Telesecundaria', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Bachillerato', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Telebachillerato', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Educación Física', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Personal de Apoyo', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Niveles Especiales', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'UPV', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Educación especial', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Nivel Superior', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Jubilados', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'SUM', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Xanati', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'IPE', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Otros', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('dependencia')->insert($dependencias);
    }
}
