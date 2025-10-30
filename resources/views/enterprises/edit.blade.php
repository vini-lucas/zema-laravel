@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('users.update', ['user' => $enterprise->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ $enterprise->name }}"><br><br>

        <label for="website">Site:</label>
        <input type="text" name="website" id="website" placeholder="www.dominio.com" value="{{ $enterprise->website }}"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com" value="{{ $enterprise->email }}"><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" placeholder="Ex.: Ativo" value="{{ $enterprise->status }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('users.edit-password', ['enterprise' => $enterprise->id]) }}">Alterar Senha</a> - <a href="{{ route('users.show', ['user' => $enterprise->id]) }}">Voltar</a>

    </form>
@endsection
