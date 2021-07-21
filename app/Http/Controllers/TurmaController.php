<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objTurma = Turma::all();

        return view("turma.list")->with(['turmas' => $objTurma]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("turma.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Turma::rules(), Turma::message())->validate();
        /*
        $request->validate([
            'nome' => 'required|max:80',
            'codigo' => 'required|max:20',
            'descricao' => 'required|max:150',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'Só é permitido 80 caracteres',
            'codigo.required' => 'O código é obrigatório',
            'codigo.max' => 'Só é permitido 20 caracteres',
            'descricao.required' => 'O descrição é obrigatório',
            'descricao.max' => 'Só é permitido 150 caracteres',
        ]);*/
        /*   $turma = new Turma;
        $turma->nome = $request->nome;
        $turma->codigo = $request->codigo;
        $turma->descricao = $request->descricao;

        $turma->save(); */
        Turma::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
        ]);

        // dd($request);
        return \redirect()->action('App\Http\Controllers\TurmaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objTurma = Turma::find($id); //select * from turma where id = $id

        return view("turma.form")->with(['turma' => $objTurma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), Turma::rules(), Turma::message())->validate();
        /*
        $turma = Turma::find($id);
        $turma->nome = $request->nome;
        $turma->codigo = $request->codigo;
        $turma->descricao = $request->descricao;

        $turma->save();
*/
        Turma::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'descricao' => $request->descricao,
            ]
        );

        // dd($request);
        return \redirect()->action('App\Http\Controllers\TurmaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
