@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Nome: {{ $flat->name }}</span><br>
    <span>Descrição: {{ $flat->description }}</span><br>
    <span>Tempo de garantia (meses): {{ $flat->months_guarantee }}</span><br>
    <span>Criado em: {{ \Carbon\Carbon::parse($flat->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($flat->created_at)->format('H:i:s')}} </span><br>
    <span>
        Última modificação:
        @if ($flat->updated_at == $flat->created_at)
            Não modificado.
        @else
            {{ \Carbon\Carbon::parse($flat->updated_at)->format('d/m/Y') }} às
            {{ \Carbon\Carbon::parse($flat->updated_at)->format('H:i:s') }}
            @can('edited.records')
                - <a href="{{ route('edited.records', ['table' => 'flats', 'register' => $flat->id]) }}">Consultar modificações</a>
            @endcan
        @endif
    </span> <br><br>

    <a href="{{ route('flats.edit', ['flat' => $flat->id]) }}">Editar</a> - <a href="{{ route('flats.index') }}">Voltar</a>
@endsection
