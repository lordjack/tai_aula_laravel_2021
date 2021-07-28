<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';

    protected $fillable = ["nome", "codigo", "descricao", 'turma_categoria_id'];


    public static function rules()
    {
        return [
            'nome' => 'required|max:80',
            'codigo' => 'required|max:20',
            'turma_categoria_id' => 'required',
            'descricao' => 'required|max:150',
        ];
    }

    public static function message()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'Só é permitido 80 caracteres',
            'codigo.required' => 'O código é obrigatório',
            'codigo.max' => 'Só é permitido 20 caracteres',
            'descricao.required' => 'O descrição é obrigatório',
            'descricao.max' => 'Só é permitido 150 caracteres',
            'turma_categoria_id.required' => 'A categoria é obrigatório',
        ];
    }
}
