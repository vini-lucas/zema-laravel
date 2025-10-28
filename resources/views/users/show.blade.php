@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $user->name }}</span><br>
    <span>CPF: {{ $user->cpf }}</span><br>
    <span>Nascimento: {{ $user->date_birth }}</span><br>
    <span>Gênero: {{ $user->gender }}</span><br>
    <span>E-mail: {{ $user->email }}</span><br>
    <span>Telefone: {{ $user->telephone }}</span><br>
    <span>Criado em: {{ $user->created_at }}</span><br>
    <span>Última modificação: {{ ($user->updated_at == null) ? 'Não modificado' : $user->updated_at }} </span><br><br>

    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> - <a href="{{ route('users.edit-password', ['user' => $user->id]) }}">Alterar Senha</a> - <a href="{{ route('users.index') }}">Voltar</a>
@endsection
