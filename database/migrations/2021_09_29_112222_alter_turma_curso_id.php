<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTurmaCursoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        //php artisan make:migration alter_turma --table=turma
        Schema::table('turma', function (Blueprint $table) {
            $table->foreignId('curso_id')->unsigned()->constrained('curso')->after('nome_arquivo');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Turma', function (Blueprint $table) {
            //
        });
    }
}
