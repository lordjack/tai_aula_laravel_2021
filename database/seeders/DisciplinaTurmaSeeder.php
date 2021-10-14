<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaTurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplina_turma')->insert([
            'disciplina_id' => 1,
            'turma_id' => 2,
        ]);
        DB::table('disciplina_turma')->insert([
            'disciplina_id' => 2,
            'turma_id' => 2,
        ]);
        DB::table('disciplina_turma')->insert([
            'disciplina_id' => 3,
            'turma_id' => 2,
        ]);
        DB::table('disciplina_turma')->insert([
            'disciplina_id' => 1,
            'turma_id' => 7,
        ]);
        DB::table('disciplina_turma')->insert([
            'disciplina_id' => 2,
            'turma_id' => 7,
        ]);
    }
}
