<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\TurmaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objResult = Turma::all();

        return view("turma.list")->with(['turmas' => $objResult]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turma_categorias = TurmaCategoria::all();

        return view("turma.form")->with(['turma_categorias' => $turma_categorias]);
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
            'turma_categoria_id' => $request->turma_categoria_id,
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
        $turma_categorias = TurmaCategoria::all(); //select * from turma_categoria

        return view("turma.form")->with(['turma' => $objTurma, 'turma_categorias' => $turma_categorias]);
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
                'turma_categoria_id' => $request->turma_categoria_id,
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
        $turma = Turma::findOrFail($id);

        $turma->delete();

        return \redirect()->action('App\Http\Controllers\TurmaController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        if ($request->tipo == "nome") {
            $objResult = Turma::where('nome', 'like', "%" . $request->valor . "%")->get();
        } else if ($request->tipo == "codigo") {
            $objResult =  Turma::where('codigo', 'like', "%" . $request->valor . "%")->get();
        } else if ($request->tipo == "categoria") {
            $objResult = Turma::whereHas('categorias', function (Builder $query) use (&$request) {
                $query->where('nome', 'like', "%" . $request->valor . "%");
            })->get();
        }
        /*
        $query = DB::table('turma');

        if ($request->tipo == "nome") {
            $query->where('turma.nome', 'like', "%" . $request->valor . "%");
        } else if ($request->tipo == "codigo") {
            $query->where('codigo', 'like', "%" . $request->valor . "%");
        }

        $objResult = $query->orderBy("id")->get();
*/
        // dd($objResult);
        return view("turma.list")->with(['turmas' => $objResult]);
    }
}
