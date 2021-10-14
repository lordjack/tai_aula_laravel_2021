<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurmaCategoria extends Model
{
    use HasFactory;
    protected $table = 'turma_categoria';

    protected $fillable = ["nome", "sigla"];

    public function turma()
    {
        return $this->hasOne(Turma::class, 'turma_categoria', 'id');
    }
}
