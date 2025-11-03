@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('flats.update', ['flat' => $flat->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ $flat->name }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Ex.: Móveis ou portáteis" value="{{ $flat->description }}"><br><br>

        <label for="months_guarantee">Tempo de garantia (meses)</label>
        <input type="number" name="months_guarantee" id="months_guarantee" placeholder="Ex.: 12" value="{{ $flat->months_guarantee }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('flats.index') }}">Voltar</a>

    </form>
@endsection
