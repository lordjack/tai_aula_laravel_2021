<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $objTurma = Turma::all();

        return view("turma.list")->with(['turmas' => $objTurma]);
    }
}
