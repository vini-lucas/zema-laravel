@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="store">Loja:</label>
        <select name="store" id="store">
            <option value="null" selected>Selecione:</option>
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->name }}" {{ (old('store') == $enterprise->name) ? 'selected' : '' }}>{{ $enterprise->name }}</option>
            @endforeach
        </select><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Nome, tipo, marca, cor e voltagem do produto" value="{{ old('description') }}"><br><br>

        <label for="flat">Plano:</label>
        <select name="flat" id="flat">
            <option value="null" selected>Selecione:</option>
            @foreach ($flats as $flat)
                <option value="{{ $flat->name }}" {{ (old('flat') == $flat->name) ? 'selected' : '' }} >{{ $flat->name }}</option>
            @endforeach
        </select><br><br>

        <label for="months_guarantee">Garantia de fábrica:</label>
        <input type="number" name="months_guarantee" id="months_guarantee" placeholder="Tempo em meses"
            value="{{ old('months_guarantee') }}"><br><br>

        <label for="factory_price">Preço de fábrica:</label>
        <input type="text" name="factory_price" id="factory_price" placeholder="Ex.: R$500,00"
            value="{{ old('factory_price') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('products.index') }}">Voltar</a>

    </form>
@endsection
