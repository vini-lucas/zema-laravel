@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $status->name }}</span><br>
    <span>Descrição: {{ $status->description }}</span><br>
    <span>Criado em: {{ \Carbon\Carbon::parse($status->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($status->created_at)->format('H:i:s')}} </span><br>
    <span>
        Última modificação:
        @if ($status->updated_at == $status->created_at)
            Não modificado.
        @else
            {{ \Carbon\Carbon::parse($status->updated_at)->format('d/m/Y') }} às
            {{ \Carbon\Carbon::parse($status->updated_at)->format('H:i:s') }}
            - <a href="{{ route('edited.records', ['table' => 'statuses', 'register' => $status->id]) }}">Consultar modificações</a>
        @endif
    </span> <br><br>

    <a href="{{ route('statuses.edit', ['status' => $status->id]) }}">Editar</a> - <a href="{{ route('statuses.index') }}">Voltar</a>
@endsection
