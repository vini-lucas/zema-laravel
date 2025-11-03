@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('flats.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ old('name') }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Ex.: Móveis ou portáteis" value="{{ old('description') }}"><br><br>

        <label for="months_guarantee">Tempo de garantia (meses)</label>
        <input type="number" name="months_guarantee" id="months_guarantee" placeholder="Ex.: 12" value="{{ old('months_guarantee') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('flats.index') }}">Voltar</a>

    </form>
@endsection
