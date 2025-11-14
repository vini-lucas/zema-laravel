@extends('layouts.admin')

@section('content')
    <h2>Produtos</h2>

    <x-alert />

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Loja</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->enterprise->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td style="display: flex;"><a href="{{ route('products.show', ['product' => $product->id]) }}">Vizualizar</a> - <a href="{{ route('products.edit', ['product' => $product->id]) }}">Editar</a> - 
                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="confirm('Confirmar a exclusão deste registro?')">Apagar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p style="color: #f00">Nenhum registro encontrado!</p>
            @endforelse
        </tbody>
    </table><br>

    {{ $products->links() }} <br>

    <a href="{{ route('products.create') }}">Cadastrar</a> - <a href="{{ route('welcome') }}">Voltar</a>
@endsection
