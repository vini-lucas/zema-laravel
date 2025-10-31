@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="store">Loja:</label>
        <select name="store" id="store">
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise }}" {{ ($enterprise == $product->store) ? 'selected' : '' }}>$enterprise</option>
            @endforeach
        </select><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Nome, tipo, marca, cor e voltagem do produto" value="{{ $product->description }}"><br><br>

        <label for="flat">Plano:</label><span style="color: #f00">Criar tabela para isto posteriormente*</span>
        <select name="flat" id="flat">
            <option value="Móveis" {{ ($product->flat == 'Móveis') ? 'selected' : '' }}>Móveis</option>
            <option value="Portáteis - troca" {{ ($product->flat == 'Portáteis - troca') ? 'selected' : '' }}>Portáteis - troca</option>
            <option value="Portáteis - reparo" {{ ($product->flat == 'Portáteis - reparo') ? 'selected' : '' }}>Portáteis - reparo</option>
        </select><br><br> 

        <label for="months_guarantee">Garantia de fábrica:</label>
        <input type="text" name="months_guarantee" id="months_guarantee" placeholder="Tempo em meses" value="{{ $product->months_guarantee }}"><br><br>

        <label for="factory_price">Preço de fábrica:</label>
        <input type="text" name="factory_price" id="factory_price" placeholder="Ex.: R$500,00" value="{{ $product->factory_price }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('products.index') }}">Voltar</a>

    </form>
@endsection
