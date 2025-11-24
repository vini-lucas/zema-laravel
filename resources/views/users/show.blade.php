@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $user->name }}</span><br>
    <span>CPF: {{ $user->cpf }}</span><br>
    <span>Nascimento: {{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') }} </span><br>
    <span>Gênero: {{ ($user->gender == 'masculino') ? 'Masculino' : (($user->gender == 'feminino') ? 'Feminino': 'Não informado') }}</span><br>
    <span>E-mail: {{ $user->email }}</span><br>
    <span>Telefone: {{ $user->telephone }}</span><br>
    <span>Status: {{ $status->name }}</span><br>
    <span>Nível de acesso: {{ $level_access->name }}</span><br>
    @if ($enterprise->name != 'Clientes')
        <span>Filial: {{ $user->branch->id . ' | ' . $enterprise->name . ' - ' . $user->branch->city }}</span><br>
    @endif
    <span>Criado em: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($user->created_at)->format('H:i:s')}} </span><br>
    <span>
        Última modificação:
        @if ($user->updated_at == $user->created_at)
            Não modificado.
        @else
            {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }} às
            {{ \Carbon\Carbon::parse($user->updated_at)->format('H:i:s') }}
            - <a href="{{ route('edited.records', ['table' => 'users', 'register' => $user->id]) }}">Consultar modificações</a>
        @endif
    </span> <br><br>

    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> - <a href="{{ route('users.edit-password', ['user' => $user->id]) }}">Alterar Senha</a> - <a href="{{ route('users.index') }}">Voltar</a>
@endsection
