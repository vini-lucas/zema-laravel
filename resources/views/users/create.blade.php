@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Usuário</h2>

    <x-alert />

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ old('name') }}"><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="{{ old('cpf') }}"><br><br>

        <label for="date_birth">Nascimento:</label>
        <input type="date" name="date_birth" id="date_birth" value="{{ old('date_birth') }}"><br><br>

        <label for="gender">Gênero:</label>
        <select name="gender" id="gender">
            <option value="null" selected>Selecione:</option>
            <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="feminino" {{ old('gender') == 'feminino' ? 'selected' : '' }}>Feminino</option>
            <option value="não_informado" {{ old('gender') == 'não_informado' ? 'selected' : '' }}>Não informar</option>
        </select><br><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" placeholder="exemplo@dominio.com"
            value="{{ old('email') }}"><br><br>

        <label for="telephone">Telefone:</label>
        <input type="text" name="telephone" id="telephone" placeholder="(XX) 9 XXXX-XXXX"
            value="{{ old('telephone') }}"><br><br>

        <label for="level_access_id">Nível de Acesso:</label>
        <select name="level_access_id" id="level_access_id">
            <option value="null" selected>Selecione:</option>
            @foreach ($levels_access as $level_access)
                <option value="{{ $level_access->id }}"
                    {{ old('level_access_id') == $level_access->id ? 'selected' : '' }}>{{ $level_access->name }} </option>
            @endforeach
        </select><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="*****************"><br><br>

        <label for="confirmation_password">Confirme-a:</label>
        <input type="password" id="confirmation_password" name="confirmation_password"
            placeholder="*****************"><br><br>

        <input type="hidden" name="branch_id" value="{{ $branch_active }}">

        <button type="submit">Cadastrar</button> - <a href="{{ route('users.select-enterprise') }}">Voltar</a>
    </form>
@endsection
