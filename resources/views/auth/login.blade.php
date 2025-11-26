@extends('layouts.login')

@section('content')
    <h2>Conecte-se!</h2>

    <x-alert />

    <form action="{{ route('login.proccess') }}" method="POST">
        @csrf
        @method('POST')

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="****************" value="{{ old('password') }}"><br><br>

        <button type="submit">Entrar</button> - <a href="{{ route('login.create') }}">Sou novo!</a> - <a href="{{ route('recover.create') }}">Esqueceu?</a>
    </form>
@endsection
