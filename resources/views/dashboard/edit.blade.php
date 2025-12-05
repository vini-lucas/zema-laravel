@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar Perfil</h2>

        <x-alert />
    </div>

    <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ $user->name }}"><br><br>

        <label for="date_birth">Nascimento:</label>
        <input type="date" name="date_birth" id="date_birth" value="{{ $user->date_birth }}"><br><br>

        <label for="gender">Gênero:</label>
        <select name="gender" id="gender">
            <option value="masculino" {{ $user->gender == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="feminino" {{ $user->gender == 'feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="não_informado" {{ $user->gender == 'não_informado' ? 'selected' : '' }}>Não informar</option>
        </select><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com"
            value="{{ $user->email }}"><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
            value="{{ $user->telephone }}"><br><br>

        <input type="hidden" name="branch_id" value="{{ $user->branch_id }}">
        <input type="hidden" name="status_id" value="{{ $user->status_id }}">
        <input type="hidden" name="level_access_id" value="{{ $user->level_access_id }}">

        <button type="submit">Salvar</button> - <a
            href="{{ route('users.edit-password', ['user' => $user->id]) }}">Alterar Senha</a> - <a
            href="{{ route('profile', ['user' => $user->id]) }}">Voltar</a>

    </form>
@endsection
