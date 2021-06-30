<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Formulário de Turma')

@section('sidebar')
@parent
@endsection

@section('content')
<p></p>
<h4>Formulário de Turma</h4>
<form action="#" method="post">
    <input type="hidden" name="id" value=""><br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="" required placeholder="Nome"><br>
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="" required><br>
        </div>
        <div class="form-group col-md-2">
        </div>

        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"
                placeholder="Sua descrição..."></textarea><br>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Salvar</button>
    <a href="#" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
</form>
@endsection
