@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>CNPJ: {{ $branch->cnpj }}</span><br>
    <span>E-mail: {{ $branch->email }}</span><br>
    <span>Telefone: {{ $branch->telephone }}</span><br>
    <span>Cidade: {{ $branch->city }}</span><br>
    <span>Número de identificação: {{ $branch->number_identifier }}</span><br>
    <span>Criado em: {{ \Carbon\Carbon::parse($branch->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($branch->created_at)->format('H:i:s')}} </span><br>
    <span>Última modificação: {{ ($branch->updated_at == $branch->created_at) ? 'Não modificado.' : \Carbon\Carbon::parse($branch->updated_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($branch->updated_at)->format('H:i:s')}} </span><br><br>

    <a href="{{ route('branchs.edit', ['branch' => $branch->id]) }}">Editar</a> - <a href="{{ route('branchs.index') }}">Voltar</a>
@endsection
