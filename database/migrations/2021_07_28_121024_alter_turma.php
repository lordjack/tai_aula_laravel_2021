<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTurma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turma', function (Blueprint $table) {
            $table->bigInteger('turma_categoria_id')->unsigned()->nullable();
            $table->foreign('turma_categoria_id')->references("id")->on('turma_categoria')->nullable();
            //  $table->string('nome_arquivo', 150)->after('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turma', function (Blueprint $table) {
            //
        });
    }
}
