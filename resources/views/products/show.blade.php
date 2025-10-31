@extends('layouts.admin')

@section('content')
    <div>
        <h2>Detalhes</h2>

        <x-alert />

    </div>

    <span>Loja: {{ $product->store }}</span><br>
    <span>Descrição: {{ $product->description }}</span><br>
    <span>Plano: {{ $product->flat }}</span><br>
    <span>Garantia de Fábrica: {{ $product->months_guarantee . 'meses.' }}</span><br>
    <span>Preço de Fábrica: {{ $product->factory_price }}</span><br>
    <span>Cadastrado em: {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($product->created_at)->format('H:i:s')}} </span><br>
    <span>Última modificação: {{ ($product->updated_at == $product->created_at) ? 'Não modificado.' : \Carbon\Carbon::parse($product->updated_at)->format('d/m/Y') . ' às ' .  \Carbon\Carbon::parse($product->updated_at)->format('H:i:s')}} </span><br><br>

    <a href="{{ route('products.edit', ['product' => $product->id]) }}">Editar</a> - <a href="{{ route('products.index') }}">Voltar</a>
@endsection
