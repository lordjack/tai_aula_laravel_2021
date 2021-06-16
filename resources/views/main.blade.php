<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Pagina Filho')

@section('sidebar')
    @parent
@endsection

@section('content')
    <p></p>
    <div class="card">
        <h5 class="card-header">Destaque</h5>
        <div class="card-body">
            <h5 class="card-title">Título especial <b>Bem vindo!</b></h5>
            <p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
            <a href="#" class="btn btn-primary">Visitar</a>
        </div>
    </div>
@endsection
