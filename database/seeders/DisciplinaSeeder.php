<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplina')->insert([
            'nome' => "Banco de Dados",
            'carga_horaria' => "60",
        ]);
        DB::table('disciplina')->insert([
            'nome' => "Programação Mobile",
            'carga_horaria' => "80",
        ]);
        DB::table('disciplina')->insert([
            'nome' => "Programação Web",
            'carga_horaria' => "80",
        ]);
    }
}
