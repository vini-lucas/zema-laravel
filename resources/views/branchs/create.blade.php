@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar</h2>

        <x-alert />
    </div>

    <form action="{{ route('branchs.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" value="{{ old('cnpj') }}"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="exemplo@dominio.com"
            value="{{ old('email') }}"><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
            value="{{ old('telephone') }}"><br><br>

        <label for="city">Cidade:</label>
        <input type="text" name="city" id="city" placeholder="Onde se localiza a filial"
            value="{{ old('city') }}"><br><br>

            <label for="enterprise_id">Empresa</label>
            <select name="enterprise_id">
                <option value="null" selected>Selecione:</option>
                @foreach ($enterprises as $enterprise)
                    <option value="{{ $enterprise->id }}" {{ ($enterprise->id == old('enterprise_id') ? 'selected' : '') }}>{{ $enterprise->name }}</option>
                @endforeach
            </select><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('branchs.index') }}">Voltar</a>

    </form>
@endsection
