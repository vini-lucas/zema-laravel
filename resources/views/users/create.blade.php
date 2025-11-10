@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Usuário</h2>

    <x-alert />

    <form method="POST" action="{{ route('users.select-branch') }}">
        @csrf
        @method('POST')

        <label for="enterprise">Empresa:</label>
        <select name="enterprise" id="enterprise">
            <option value="null" selected>Selecione:</option>
            @foreach ($enterprises as $enterprise)
                <option value="{{ $enterprise->id }}" {{ $enterprise_active == $enterprise->id ? 'selected' : '' }}>
                    {{ $enterprise->name }}</option>
                    {{ $value_enterprise = $enterprise->id }}
            @endforeach
        </select>
        <button type="submit">Pesquisar filiais</button><br><br>

        <label for="branch_id">Filial:</label>
        <select name="branch_id" id="branch_id">
            @if ($branches != 'null')
                <option value="null" selected>Selecione:</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->city }}</option>
                        {{ $value_branch = $branch->id }}
                @endforeach
            @else
                <option value="null_enterprise">Selecione a Empresa!</option>
            @endif
        </select><br><br>
    </form>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <input type="hidden" name="enterprise" value="{{ $value_enterprise->id }}">
        <input type="hidden" name="branch_id" value="{{ $value_branch->id }}">

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="NOME COMPLETO" value="{{ old('name') }}"><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX"
            value="{{ old('cpf') }}"><br><br>

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

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="*****************"><br><br>

        <label for="confirmation_password">Confirme-a:</label>
        <input type="password" id="confirmation_password" name="confirmation_password"
            placeholder="*****************"><br><br>

        <button type="submit">Cadastrar</button> - <a href="{{ route('users.index') }}">Voltar</a>
    </form>
@endsection
