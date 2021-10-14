<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaTurma extends Migration
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
        Schema::create('disciplina_turma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disciplina_id')->unsigned()->nullable()->constrained('disciplina');
            $table->foreignId('turma_id')->unsigned()->nullable()->constrained('turma');
            $table->timestamps();
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
        Schema::table('disciplina_turma', function (Blueprint $table) {
            //
        });
    }
}
