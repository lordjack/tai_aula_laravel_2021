<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Formulário de Turma')

@section('sidebar')
@parent
@endsection

@section('content')
<p></p>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@php
if(!empty(Request::route('id'))){
    $action = action('App\Http\Controllers\TurmaController@update',$turma->id );
}else{
    $action = action('App\Http\Controllers\TurmaController@store');
}

@endphp
<h4>Formulário de Turma</h4>
<form action="{{ $action }}" method="post">
    @csrf
    <div class="form-row">
        <input type="hidden" name="id"
            value="@if(!empty(old('id'))) {{old('id') }}  @elseif (!empty($turma->id)) {{ $turma->id}} @endif">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control"
                value="@if(!empty(old('nome'))) {{old('nome') }}  @elseif (!empty($turma->nome)) {{ $turma->nome}} @endif"
                placeholder="Nome"><br>
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control"
                value="@if(!empty(old('codigo'))) {{old('codigo') }}  @elseif (!empty($turma->codigo)) {{ $turma->codigo}} @endif"><br>
        </div>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"
                placeholder="Sua descrição..."> @if(!empty(old('descricao'))) {{old('descricao') }}  @elseif (!empty($turma->descricao)) {{ $turma->descricao}} @endif</textarea><br>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Salvar</button>
    <a href="{{url("/turma")}}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
</form>
@endsection
