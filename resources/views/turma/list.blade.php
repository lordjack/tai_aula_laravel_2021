<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Listagem de Turma')

@section('sidebar')
@parent

<p>This is appended to the master sidebar 1.</p>
@endsection

@section('content')
<h4>Listagem de Turmas</h4>
<p></p>
<a href="{{url("/turma/create")}}" class="btn btn-primary"> <i class="fas fa-plus"></i> Cadastrar</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Código</th>
            <th scope="col">Ação</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($turmas as $item)
        <tr>
            <th scope='row'>{{$item->id}}</th>
            <td>{{$item->nome}}</td>
            <td>{{$item->codigo}}</td>
            <td><a href='#' style='color:orange;'><i class='fas fa-edit'></i></a>
            </td>
            <td><a href='#' onclick=\"return confirm('Deseja realmente remover o registro?'); \" style='color:red;'><i
                        class='fas fa-trash'></i></a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
