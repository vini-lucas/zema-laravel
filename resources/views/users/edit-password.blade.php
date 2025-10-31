@extends('layouts.admin')

@section('content')
    <div>
        <h2>Alterar Senha</h2>

        <x-alert />

    </div>

    <form action="{{ route('users.update-password', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="****************" value="{{ old('password') }}"><br><br>

        <label for="confirmation_password">Confirme-a:</label>
        <input type="password" id="confirmation_password" name="confirmation_password" placeholder="****************" value="{{ old('confirmation_password') }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('users.show', ['user' => $user->id]) }}">Voltar</a>

    </form>
@endsection
