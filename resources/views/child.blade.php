<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Pagina Filho')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar 1.</p>
@endsection

@section('content')
    <b>Pagina Filho</b>
    <b>Bem vindo {{ $nome }}!</b>
    <p>This is my body content 2.</p>
@endsection
