@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar INSS</h2>

        <x-alert />
    </div>

    <form action="{{ route('inss.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"><br><br>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome Completo" value="{{ old('name') }}"><br><br>

        <label for="date_birth">Nascimento:</label>
        <input type="date" name="date_birth" id="date_birth" value="{{ old('date_birth') }}"><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX" value="{{ old('telephone') }}"><br><br>

        <label for="literate">Alfabetizado?</label>
        <select name="literate" id="literate">
            <option value="null" {{ (old('literate') == 'null' ? 'selected' : '') }}>Selecione:</option>
            <option value="1" {{ (old('literate') == '1' ? 'selected' : '') }}>Sim</option>
            <option value="2" {{ (old('literate') == '2' ? 'selected' : '') }}>Não</option>
        </select>

        <button type="submit">Cadastrar</button> - <a href="{{ route('products.index') }}">Voltar</a>

    </form>
@endsection
