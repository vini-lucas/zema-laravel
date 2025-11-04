@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar</h2>

        <x-alert />
    </div>

    <form action="{{ route('branchs.update', ['branch' => $branch->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX"
            value="{{ $branch->cnpj }}"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com" value="{{ $branch->email }}"><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
            value="{{ $branch->telephone }}"><br><br>

        <label for="city">Cidade:</label>
        <input type="text" name="city" id="city" placeholder="Onde se localiza a filial"
            value="{{ $branch->city }}"><br><br>

            <label for="number_identifier">Número:</label>
        <input type="number" name="number_identifier" id="number_identifier" placeholder="Número da filial"
            value="{{ $branch->number_identifier }}"><br><br>

        <button type="submit">Salvar</button> - <a href="{{ route('branchs.index') }}">Voltar</a>

    </form>
@endsection
