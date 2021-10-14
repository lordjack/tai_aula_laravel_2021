<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('curso')->insert([
            'nome' => "Técnico em Informática",
            'abreviatura' => "TECINFO",
            'data_inicio' => "2021-01-01",
            'data_fim' => "2021-06-01",
        ]);
        DB::table('curso')->insert([
            'nome' => "Técnico em Mecanica",
            'abreviatura' => "TECMEC",
            'data_inicio' => "2021-01-01",
            'data_fim' => "2021-06-01",
        ]);
        DB::table('curso')->insert([
            'nome' => "Engenharia de Software",
            'abreviatura' => "ENGSOFT",
            'data_inicio' => "2020-01-01",
            'data_fim' => "2024-01-01",
        ]);
    }
}
