@extends('layouts.login')

@section('content')
    <h1>Bem-vindo à Zema!</h1>

    Possui cadastro? <a href="{{ route('login') }}">Realize o login!</a><br>
    Não possui? <a href="{{ route('login') }}">Cadastre-se!</a><br>
@endsection
