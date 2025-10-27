@extends('layouts.admin')

@section('content')
    <h2>Detalhes</h2><br>

    <span>Nome: {{ $user->name }}</span><br>
    <span>CPF: {{ $user->cpf }}</span><br>
    <span>Nascimento: {{ $user->date_birth }}</span><br>
    <span>Gênero: {{ $user->gender }}</span><br>
    <span>E-mail: {{ $user->email }}</span><br>
    <span>Telefone: {{ $user->telephone }}</span><br>
    <span>Criado em: {{ $user->created_at }}</span><br>
    <span>Última modificação:  {{ $user->modified_at ? $user->modified_at : 'Não modificado' }} </span><br>

@endsection
