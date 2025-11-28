@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ old('name') }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Descrição dos status"
            value="{{ old('description') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('statuses.index') }}">Voltar</a>

    </form>
@endsection
