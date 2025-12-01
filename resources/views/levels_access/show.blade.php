@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $levels_access->name }}</span><br>
    <span>Descrição: {{ $levels_access->description }}</span><br>
    <span>Criado em: {{ \Carbon\Carbon::parse($levels_access->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($levels_access->created_at)->format('H:i:s')}} </span><br>
    <span>
        Última modificação:
        @if ($levels_access->updated_at == $levels_access->created_at)
            Não modificado.
        @else
            {{ \Carbon\Carbon::parse($levels_access->updated_at)->format('d/m/Y') }} às
            {{ \Carbon\Carbon::parse($levels_access->updated_at)->format('H:i:s') }}
            - <a href="{{ route('edited.records', ['table' => 'levels_access', 'register' => $levels_access->id]) }}">Consultar modificações</a>
        @endif
    </span> <br><br>

    {{-- <a href="{{ route('levels_access.edit', ['levels_access' => $levels_access->id]) }}">Editar</a> - <a href="{{ route('levels_access.index') }}">Voltar</a> --}}
@endsection
