@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('levels_access.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do nívei de acesso" value="{{ old('name') }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Descrição do nívei de acesso"
            value="{{ old('description') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('levels_access.index') }}">Voltar</a>

    </form>
@endsection
