@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('enterprises.update', ['enterprise' => $enterprise->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ $enterprise->name }}"><br><br>

        <label for="website">Site:</label>
        <input type="text" name="website" id="website" placeholder="www.dominio.com" value="{{ $enterprise->website }}"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com" value="{{ $enterprise->email }}"><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" placeholder="Ex.: Ativo" value="{{ $enterprise->status }}"><br><br>

        <label for="logo">Logo:</label>
        <input type="text" name="logo" id="logo" placeholder="Ex.: logo.png" value="{{ $enterprise->logo }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('enterprises.index') }}">Voltar</a>

    </form>
@endsection
