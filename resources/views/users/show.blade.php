@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $user->name }}</span><br>
    <span>CPF: {{ $user->cpf }}</span><br>
    <span>Nascimento: {{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') }} </span><br>
    <span>Gênero: {{ ($user->gender == 'masculine') ? 'Masculino' : (($user->gender == 'feminino') ? 'Feminino': 'Não informado') }}</span><br>
    <span>E-mail: {{ $user->email }}</span><br>
    <span>Telefone: {{ $user->telephone }}</span><br>
    <span>Status: {{ $user->status }}</span><br>
    <span>Filial: {{ $user->branch->id . ' | ' . $enterprise->name . ' - ' . $user->branch->city }}</span><br>
    <span>Criado em: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($user->created_at)->format('H:i:s')}} </span><br>
    <span>Última modificação: {{ ($user->updated_at == $user->created_at) ? 'Não modificado' : \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($user->updated_at)->format('H:i:s')}} </span><br><br>

    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> - <a href="{{ route('users.edit-password', ['user' => $user->id]) }}">Alterar Senha</a> - <a href="{{ route('users.index') }}">Voltar</a>
@endsection
