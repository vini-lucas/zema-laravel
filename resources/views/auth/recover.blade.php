@extends('layouts.login')

@section('content')
    <h2>Reconecte-se!</h2>

    <x-alert />

    <form action="{{ route('storeRecover.create') }}" method="POST">
        @csrf
        @method('POST')

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"><br><br>

        <button type="submit">Recuperar</button> - <a href="{{ route('login') }}">Voltar</a>
    </form>
@endsection
