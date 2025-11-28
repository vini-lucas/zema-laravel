@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('statuses.update', ['status' => $status->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ $status->name }}"><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" placeholder="Descrição dos status"
            value="{{ $status->description }}"><br><br>

        <button type="submit">Editar</button> - <a href="{{ route('statuses.index') }}">Voltar</a>

    </form>
@endsection
