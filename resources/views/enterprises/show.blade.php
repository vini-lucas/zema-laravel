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
    <span>Logo: {{ $enterprise->logo }}</span><br>
    <span>Criado em:
        {{ \Carbon\Carbon::parse($enterprise->created_at)->format('d/m/Y') . ' às ' . \Carbon\Carbon::parse($enterprise->created_at)->format('H:i:s') }}
    </span><br>
    <span>
        Última modificação:
        @if ($enterprise->updated_at == $enterprise->created_at)
            Não modificado.
        @else
            {{ \Carbon\Carbon::parse($enterprise->updated_at)->format('d/m/Y') }} às
            {{ \Carbon\Carbon::parse($enterprise->updated_at)->format('H:i:s') }}
            - <a href="{{ route('edited.records') }}">Consultar modificações</a>
        @endif
    </span> <br><br>

    <a href="{{ route('enterprises.edit', ['enterprise' => $enterprise->id]) }}">Editar</a> - <a
        href="{{ route('enterprises.index') }}">Voltar</a>
@endsection
