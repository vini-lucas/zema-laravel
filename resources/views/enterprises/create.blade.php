@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('enterprises.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Ex.: Zema Financeira" value="{{ old('name') }}"><br><br>

        <label for="website">Site:</label>
        <input type="text" name="website" id="website" placeholder="www.dominio.com" value="{{ old('website') }}"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com" value="{{ old('email') }}"><br><br>

        <label for="logo">Logo:</label>
        <input type="text" name="logo" id="logo" placeholder="Ex.: logo.png" value="{{ old('logo') }}"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('enterprises.index') }}">Voltar</a>

    </form>
@endsection
