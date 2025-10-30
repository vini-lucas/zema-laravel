@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $enterprise->name }}</span><br>
    <span>E-mail: {{ $enterprise->email }}</span><br>
    <span>Site: {{ $enterprise->website }}</span><br>
    <span>Status: {{ $enterprise->status }}</span><br>
    <span>Logo:: {{ $enterprise->logo }}</span><br>
    <span>Criado em: {{ $enterprise->created_at }}</span><br>
    <span>Última modificação: {{ ($enterprise->updated_at == null) ? 'Não modificado' : $enterprise->updated_at }} </span><br><br>

    <a href="{{ route('users.edit', ['user' => $enterprise->id]) }}">Editar</a> - <a href="{{ route('enterprises.index') }}">Voltar</a>
@endsection
