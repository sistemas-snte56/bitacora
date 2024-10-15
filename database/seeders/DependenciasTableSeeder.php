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
            ['dependencia' => 'DGEPE', 'created_at' => now(), 'updated_at' => now()],
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
            ['dependencia' => 'XANATI', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'COMISIÓN SINDICAL', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'Otros', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'ACUERDOS', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'GESTORÍA', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'ASUNTO PERSONAL PERSONAL', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'SSTEEV', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'IPE', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'ISSSTE', 'created_at' => now(), 'updated_at' => now()],
            ['dependencia' => 'CDMX', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('dependencia')->insert($dependencias);
    }
}
