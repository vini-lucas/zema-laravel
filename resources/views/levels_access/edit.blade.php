@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('levels_access.update', ['level_access' => $levels_access]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ $levels_access->name }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Descrição dos status"
            value="{{ $levels_access->description }}"><br><br>

        <button type="submit">Editar</button> - <a href="{{ route('levels_access.index') }}">Voltar</a>

    </form>
@endsection
