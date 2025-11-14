@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="enterprise_id">Loja:</label>
        <select name="enterprise_id" id="enterprise_id">
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ ($enterprise->name == $product->enterprise_id) ? 'selected' : '' }}>
                    {{ $enterprise->name }}</option>
            @endforeach
        </select><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Nome, tipo, marca, cor e voltagem do produto"
            value="{{ $product->description }}"><br><br>

        <label for="flat_id">Plano:</label>
        <select name="flat_id" id="flat_id">
            @foreach ($flats as $flat)
                <option value="{{ $flat->id }}" {{ ($flat->name == $product->flat_id) ? 'selected' : ''}}>{{ $flat->name }}</option>
            @endforeach
        </select><br><br>

        <label for="months_guarantee">Garantia de fábrica:</label>
        <input type="text" name="months_guarantee" id="months_guarantee" placeholder="Tempo em meses"
            value="{{ $product->months_guarantee }}"><br><br>

        <label for="factory_price">Preço de fábrica:</label>
        <input type="text" name="factory_price" id="factory_price" placeholder="Ex.: R$500,00"
            value="{{ $product->factory_price }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('products.index') }}">Voltar</a>

    </form>
@endsection
