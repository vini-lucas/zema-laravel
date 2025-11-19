@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
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

        <label for="branch">Filial:</label>
        <input type="text" id="branch"
            value="{{ $user->branch->id . ' | ' . $enterprise_active->name . ' - ' . $user->branch->city }}"
            disabled><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
            value="{{ $user->telephone }}"><br><br>

        @if ($user->level_access_id == 1)
            <label for="level_access_id">Nível de Acesso:</label>
            <select name="level_access_id" id="level_access_id" disabled>
                <option value="{{ $user->level_access_id }}">Desenvolvedor</option>
            </select><br><br>
        @else
            <label for="level_access_id">Nível de Acesso:</label>
            <select name="level_access_id" id="level_access_id">
                @foreach ($levels_access as $level_access)
                    <option value="{{ $level_access->id }}"
                        {{ $user->level_access_id == $level_access->id ? 'selected' : '' }}>{{ $level_access->name }}
                    </option>
                @endforeach
        @endif
        </select><br><br>

        <input type="hidden" name="branch_id" value="{{ $user->branch_id }}">
        <input type="hidden" name="status_id" value="{{ $user->status_id }}">

        <button type="submit">Salvar</button> - <a
            href="{{ route('users.select-enterprise-update', ['user' => $user->id]) }}">Alterar Empresa e/ou Filial</a> -
        <a href="{{ route('users.edit-password', ['user' => $user->id]) }}">Alterar Senha</a> - <a
            href="{{ route('users.index') }}">Voltar</a>

    </form>
@endsection
