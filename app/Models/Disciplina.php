<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplina';

    protected $fillable = ["nome", "carga_horaria"];


    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'disciplina_turma', 'disciplina_id', 'turma_id');
    }
}
