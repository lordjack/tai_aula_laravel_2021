<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Listagem de Turma')

@section('sidebar')
@parent
@endsection

@section('content')
<h4>Listagem de Turmas</h4>
<p></p>
<form action="{{ action('App\Http\Controllers\TurmaController@search') }}" method="post">
    @csrf
    <div class="form-row">
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Digite sua pesquisa..." name="valor" id="">
        </div>
        <div class="col-3">
            <select name="tipo" class="form-control" id="">
                <option value="nome">Nome</option>
                <option value="codigo">Código</option>
                <option value="categoria">Categoria</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
        <div class="col-4">
            <a href="{{url("/turma/create")}}" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Cadastrar</a>
            <a href="{{url("/turma-relatorio")}}" class="btn btn-danger"> <i class="fas fa-file-pdf"></i> Relatório</a>
            <a href="{{url("/turma-email")}}" class="btn btn-warning"> <i class="fas fa-paper-plane"></i> Enviar Email</a>
        </div>
    </div>
</form>
<p>
</p>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Código</th>
            <th scope="col">Curso</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ação</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($turmas as $item)
        @php
        !empty($item->nome_arquivo) ? $nome_arquivo = $item->nome_arquivo : $nome_arquivo = "sem_imagem.jpg";
        @endphp
        <tr>
            <th scope='row'>{{$item->id}}</th>
            <td><img src="/storage/imagem/{{$nome_arquivo}}" width="100px" /></td>
            <td>{{$item->nome}}</td>
            <td>{{$item->codigo}}</td>
            <td>{{$item->curso->nome ?? "" }}</td>
            <td>{{$item->categorias->nome ?? "" }}</td>
            <td><a href="{{ action('App\Http\Controllers\TurmaController@edit',$item->id) }}" style='color:orange;'><i
                        class='fas fa-edit'></i></a>
            </td>
            <td><a href='{{ action('App\Http\Controllers\TurmaController@destroy', $item->id) }}'
                    onclick="return confirm('Deseja realmente remover o registro?');" style='color:red;'><i
                        class='fas fa-trash'></i></a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">{{ $turmas->links() }}</div>
@endsection
